<?php

namespace Cmf\MainBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\PHPCR\DocumentManager;

use PHPCR\Util\NodeHelper;

use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadataInterface;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\SeoBundle\Doctrine\Phpcr\SeoMetadata;
use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;
use Symfony\Component\Yaml\Parser;

class LoadStaticData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 5;
    }


    public function load(ObjectManager $manager)
    {
        $session = $manager->getPhpcrSession();
        $yaml = new Parser();

        $basepath = $this->container->getParameter('cmf_simple_cms.persistence.phpcr.basepath');
        NodeHelper::createPath($session, preg_replace('#/[^/]*$#', '', $basepath));

        $data = $yaml->parse(file_get_contents(__DIR__.'/../../Resources/data/page.yml'));
        foreach ($data['static'] as $overview) {
            $class = isset($overview['class']) ? $overview['class'] : '\Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page';

            $parent = (isset($overview['parent']) ? trim($overview['parent'], '/') : '');
            $name = (isset($overview['name']) ? trim($overview['name'], '/') : '');

            $path = $basepath
                .(empty($parent) ? '' : '/' . $parent)
                .(empty($name) ? '' : '/' . $name);

            $page = $manager->find($class, $path);
            if (!$page) {
                $page = new $class();
                $page->setId($path);
            }

            if (isset($overview['formats'])) {
                $page->setDefault('_format', reset($overview['formats']));
                $page->setRequirement('_format', implode('|', $overview['formats']));
            }

            if (!empty($overview['template'])) {
                $page->setDefault(RouteObjectInterface::TEMPLATE_NAME, $overview['template']);
            }

            if (!empty($overview['controller'])) {
                $page->setDefault(RouteObjectInterface::CONTROLLER_NAME, $overview['controller']);
            }

            if (!empty($overview['options'])) {
                $page->setOptions($overview['options']);
            }

            if (!empty($overview['seo-metadata']) && $page instanceof SeoAwareInterface) {
                $seoMetadata = new SeoMetadata();
                $seoMetadata->setMetaDescription(
                    !empty($overview['seo-metadata']['description']) ? $overview['seo-metadata']['description'] : ''
                );
                $seoMetadata->setMetaKeywords(
                    !empty($overview['seo-metadata']['keywords']) ? $overview['seo-metadata']['keywords'] : ''
                );
                $seoMetadata->setOriginalUrl(
                    !empty($overview['seo-metadata']['original-url']) ? $overview['seo-metadata']['original-url'] : ''
                );
                $page->setSeoMetadata($seoMetadata);
            }

            $manager->persist($page);

            if (is_array($overview['title'])) {
                foreach ($overview['title'] as $locale => $title) {
                    $page->setTitle($title);
                    if (isset($overview['label'][$locale]) && $overview['label'][$locale]) {
                        $page->setLabel($overview['label'][$locale]);
                    } elseif (!isset($overview['label'][$locale])) {
                        $page->setLabel($title);
                    }
                    $page->setBody($overview['body'][$locale]);
                    $manager->bindTranslation($page, $locale);
                }
            } else {
                $page->setTitle($overview['title']);
                if (isset($overview['label'])) {
                    if ($overview['label']) {
                        $page->setLabel($overview['label']);
                    }
                } elseif (!isset($overview['label'])) {
                    $page->setLabel($overview['title']);
                }
                $page->setBody($overview['body']);
            }

            if (isset($overview['create_date'])) {
                $page->setCreateDate(date_create_from_format('U', strtotime($overview['create_date'])));
            }

            if (isset($overview['publish_start_date'])) {
                $page->setPublishStartDate(date_create_from_format('U', strtotime($overview['publish_start_date'])));
            }

            if (isset($overview['publish_end_date'])) {
                $page->setPublishEndDate(date_create_from_format('U', strtotime($overview['publish_end_date'])));
            }
        } 
        
        $data = $yaml->parse(file_get_contents(__DIR__ . '/../../Resources/data/external.yml'));

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

        $blocks = $yaml->parse(file_get_contents(__DIR__ . '/../../Resources/data/block.yml'));
        $blockBasepath = $this->container->getParameter('cmf_block.persistence.phpcr.block_basepath');
        NodeHelper::createPath($session, $blockBasepath);
        $blocksHome = $manager->find(null, $blockBasepath);

        foreach ($blocks['static'] as $name => $block) {
            $this->loadBlock($manager, $blocksHome, $name, $block);
        }

        $manager->flush();
    }

    /**
     * Load a block from the fixtures and create / update the node. Recurse if there are children.
     *
     * @param ObjectManager $manager the document manager
     * @param string $parentPath the parent of the block
     * @param string $name the name of the block
     * @param array $block the block definition
     */
    private function loadBlock(ObjectManager $manager, $parent, $name, $block)
    {
        $className = $block['class'];
        $document = $manager->find(null, $this->getIdentifier($manager, $parent) . '/' . $name);
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
