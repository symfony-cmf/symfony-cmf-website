<?php

namespace Cmf\MainBundle\DataFixtures\PHPCR;

use Symfony\Component\Yaml\Parser;
use Symfony\Cmf\Bundle\SimpleCmsBundle\DataFixtures\LoadCmsData;

use Symfony\Cmf\Bundle\MenuBundle\Document\MenuNode;

use Doctrine\Common\Persistence\ObjectManager;

class LoadStaticData extends LoadCmsData
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

        $yaml = new Parser();
        $data = $yaml->parse(file_get_contents(__DIR__ . '/../../Resources/data/external.yml'));

        $basepath = $this->container->getParameter('symfony_cmf_simple_cms.basepath');
        $home = $dm->find(null, $basepath);

        foreach ($data['static'] as $name => $overview) {
            $item = new MenuNode();
            $item->setName($name);
            $item->setLabel($overview['label']);
            $item->setUri($overview['uri']);
            $item->setParent($home);
            $dm->persist($item);
        }

        $dm->flush();
    }

}
