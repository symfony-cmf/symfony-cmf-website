<?php

namespace Cmf\MainBundle\DataFixtures\PHPCR;

use Doctrine\Common\Persistence\ObjectManager;
use PHPCR\Util\NodeHelper;
use Symfony\Component\Yaml\Parser;
use Symfony\Cmf\Bundle\SimpleCmsBundle\DataFixtures\Phpcr\AbstractLoadPageData;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;

class LoadStaticData extends AbstractLoadPageData

{
    public function getOrder()
    {
        return 5;
    }

    protected function getData()
    {
        $yaml = new Parser();
        return $yaml->parse(file_get_contents(__DIR__.'/../../Resources/data/page.yml'));
    }

    public function load(ObjectManager $dm)
    {
        parent::load($dm);
        $session = $dm->getPhpcrSession();

        $yaml = new Parser();
        $data = $yaml->parse(file_get_contents(__DIR__ . '/../../Resources/data/external.yml'));

        $basepath = $this->container->getParameter('cmf_core.persistence.phpcr.basepath');
        $home = $dm->find(null, $basepath);

        foreach ($data['static'] as $name => $overview) {
            $item = new MenuNode();
            $item->setName($name);
            $item->setLabel($overview['label']);
            $item->setUri($overview['uri']);
            $item->setParent($home);
            $dm->persist($item);
        }

        $blocks = $yaml->parse(file_get_contents(__DIR__ . '/../../Resources/data/block.yml'));
        $blockBasepath = $this->container->getParameter('cmf_block.persistence.phpcr.block_basepath');
        NodeHelper::createPath($session, $blockBasepath);
        $blocksHome = $dm->find(null, $blockBasepath);

        foreach ($blocks['static'] as $name => $block) {
            $this->loadBlock($dm, $blocksHome, $name, $block);
        }

        $dm->flush();
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
