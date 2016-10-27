<?php

namespace AppBundle\DataFixtures\PHPCR;

use AppBundle\Document\SeoPage;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PHPCR\Util\NodeHelper;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;
use Symfony\Cmf\Bundle\SeoBundle\SitemapAwareInterface;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\SeoBundle\Doctrine\Phpcr\SeoMetadata;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Finder\Finder;
use Parsedown;

class LoadStaticData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    private $parsedown;

    public function __construct()
    {
        $this->parsedown = new Parsedown();
    }

    public function getOrder()
    {
        return 5;
    }

    public function load(ObjectManager $manager)
    {
        $dataDir = __DIR__.'/../../Resources/data';
        $session = $manager->getPhpcrSession();
        $yaml = new Parser();

        $basepath = $this->container->getParameter('cmf_simple_cms.persistence.phpcr.basepath');
        NodeHelper::createPath($session, preg_replace('#/[^/]*$#', '', $basepath));

        $data = $yaml->parse(file_get_contents($dataDir.'/page.yml'));
        foreach ($data['static'] as $overview) {
            $this->loadPage($manager, $basepath, $overview);
        }

        // load single pages
        $finder = new Finder();
        $finder
            ->files()
            ->name('*.yml')
            ->in($dataDir.'/posts')
            ->sortByName()
        ;

        foreach ($finder as $pageFile) {
            $post = array_merge(array(
                'parent' => '/news',
                'label' => false,
                'format' => 'markdown',
                'template' => 'cms/news_detail.html.twig',
            ), $yaml->parse(file_get_contents($pageFile)));

            $this->loadPage($manager, $basepath, $post);
        }

        $data = $yaml->parse(file_get_contents(__DIR__.'/../../Resources/data/external.yml'));

        $basepath = $this->container->getParameter('cmf_core.persistence.phpcr.basepath');
        $home = $manager->find(null, $basepath);

        foreach ($data['static'] as $name => $overview) {
            $item = new MenuNode();
            $item->setName($name);
            $item->setLabel($overview['label']);
            $item->setUri($overview['uri']);
            $item->setParentDocument($home);
            $manager->persist($item);
        }

        $blocks = $yaml->parse(file_get_contents(__DIR__.'/../../Resources/data/block.yml'));
        $blockBasepath = $this->container->getParameter('cmf_block.persistence.phpcr.block_basepath');
        NodeHelper::createPath($session, $blockBasepath);
        $blocksHome = $manager->find(null, $blockBasepath);

        foreach ($blocks['static'] as $name => $block) {
            $this->loadBlock($manager, $blocksHome, $name, $block);
        }

        $manager->flush();
    }

    private function loadPage(ObjectManager $manager, $basepath, $pageData)
    {
        $class = isset($pageData['class']) ? $pageData['class'] : SeoPage::class;
        $format = isset($pageData['format']) ? $pageData['format'] : 'html';

        $parent = (isset($pageData['parent']) ? trim($pageData['parent'], '/') : '');
        $name = (isset($pageData['name']) ? trim($pageData['name'], '/') : '');

        $path = $basepath
            .(empty($parent) ? '' : '/'.$parent)
            .(empty($name) ? '' : '/'.$name);

        $page = $manager->find($class, $path);
        if (!$page) {
            $page = new $class();
            $page->setId($path);
        }

        if (isset($pageData['formats'])) {
            $page->setDefault('_format', reset($pageData['formats']));
            $page->setRequirement('_format', implode('|', $pageData['formats']));
        }

        if (!empty($pageData['template'])) {
            $page->setDefault(RouteObjectInterface::TEMPLATE_NAME, $pageData['template']);
        }

        if (!empty($pageData['controller'])) {
            $page->setDefault(RouteObjectInterface::CONTROLLER_NAME, $pageData['controller']);
        }

        if (!empty($pageData['options'])) {
            $page->setOptions($pageData['options']);
        }

        if (!empty($pageData['seo-metadata']) && $page instanceof SeoAwareInterface) {
            $seoMetadata = new SeoMetadata();
            $seoMetadata->setMetaDescription(
                !empty($pageData['seo-metadata']['description']) ? $pageData['seo-metadata']['description'] : ''
            );
            $seoMetadata->setMetaKeywords(
                !empty($pageData['seo-metadata']['keywords']) ? $pageData['seo-metadata']['keywords'] : ''
            );
            $seoMetadata->setOriginalUrl(
                !empty($pageData['seo-metadata']['original-url']) ? $pageData['seo-metadata']['original-url'] : ''
            );
            $page->setSeoMetadata($seoMetadata);
        }

        if ($page instanceof SitemapAwareInterface) {
            $page->setIsVisibleForSitemap(true);
        }

        $manager->persist($page);

        if (is_array($pageData['title'])) {
            foreach ($pageData['title'] as $locale => $title) {
                $page->setTitle($title);
                if (isset($pageData['label'][$locale]) && $pageData['label'][$locale]) {
                    $page->setLabel($pageData['label'][$locale]);
                } elseif (!isset($pageData['label'][$locale])) {
                    $page->setLabel($title);
                }

                $page->setBody($this->parseBody($pageData['body'][$locale], $format));
                $manager->bindTranslation($page, $locale);
            }
        } else {
            $page->setTitle($pageData['title']);
            if (isset($pageData['label'])) {
                if ($pageData['label']) {
                    $page->setLabel($pageData['label']);
                }
            } elseif (!isset($pageData['label'])) {
                $page->setLabel($pageData['title']);
            }
            $page->setBody($this->parseBody($pageData['body'], $format));
        }

        if (isset($pageData['create_date'])) {
            $page->setCreateDate(date_create_from_format('U', strtotime($pageData['create_date'])));
        }

        if (isset($pageData['publish_start_date'])) {
            $page->setPublishStartDate(date_create_from_format('U', strtotime($pageData['publish_start_date'])));
        }

        if (isset($pageData['publish_end_date'])) {
            $page->setPublishEndDate(date_create_from_format('U', strtotime($pageData['publish_end_date'])));
        }
    }

    private function parseBody($body, $format)
    {
        switch ($format) {
            case 'html':
                return $body;
            case 'markdown':
                return $this->parsedown->text($body);
            default:
                throw new \InvalidArgumentException(sprintf(
                    'Unknown format "%s"', $format
                ));
        }
    }

    /**
     * Load a block from the fixtures and create / update the node. Recurse if there are children.
     *
     * @param ObjectManager $manager    the document manager
     * @param string        $parentPath the parent of the block
     * @param string        $name       the name of the block
     * @param array         $block      the block definition
     */
    private function loadBlock(ObjectManager $manager, $parent, $name, $block)
    {
        $className = $block['class'];
        $document = $manager->find(null, $this->getIdentifier($manager, $parent).'/'.$name);
        $class = $manager->getClassMetadata($className);
        if ($document && get_class($document) != $className) {
            $manager->remove($document);
            $document = null;
        }
        if (!$document) {
            $document = $class->newInstance();

            // $document needs to be an instance of BaseBlock ...
            $document->setParentDocument($parent);
            $document->setName($name);
        }

        if ($className == 'Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ReferenceBlock') {
            $referencedBlock = $manager->find(null, $block['referencedBlock']);
            if (null == $referencedBlock) {
                throw new \Exception('did not find '.$block['referencedBlock']);
            }
            $document->setReferencedBlock($referencedBlock);
        } elseif ($className == 'Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ActionBlock') {
            $document->setActionName($block['actionName']);
        }

        // set properties
        if (isset($block['properties'])) {
            foreach ($block['properties'] as $propName => $prop) {
                $class->reflFields[$propName]->setValue($document, $prop);
            }
        }

        $manager->persist($document);

        // create children
        if (isset($block['children'])) {
            foreach ($block['children'] as $childName => $child) {
                $this->loadBlock($manager, $document, $childName, $child);
            }
        }
    }

    private function getIdentifier($manager, $document)
    {
        $class = $manager->getClassMetadata(get_class($document));

        return $class->getIdentifierValue($document);
    }
}
