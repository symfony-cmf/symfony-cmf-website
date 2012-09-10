<?php

namespace Cmf\MainBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Cmf\Bundle\SimpleCmsBundle\Document\Page;

use PHPCR\Util\NodeHelper;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Yaml\Parser;


class LoadStaticData extends ContainerAware implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $session = $manager->getPhpcrSession();
        $basepath = $this->container->getParameter('symfony_cmf_simple_cms.basepath');
        $basepath = explode('/', $basepath);
        $homename = array_pop($basepath);
        $basepath = implode('/', $basepath);

        NodeHelper::createPath($session, $basepath);

        $yaml = new Parser();
        $data = $yaml->parse(file_get_contents(__DIR__ . '/../static/page.yml'));

        $base = $manager->find(null, $basepath);

        $overview = $data['static']['home'];
        $home = new Page();
        $home->setPosition($base, $homename);
        $home->setLabel($overview['title']);
        $home->setTitle($overview['title']);
        $home->setBody($overview['content']);
        unset($data['static']['home']);

        $manager->persist($home);

        foreach ($data['static'] as $overview) {
            $page = new Page();
            $page->setPosition($home, $overview['name']);

            $page->setLabel($overview['title']);

            $page->setTitle($overview['title']);
            $page->setBody($overview['content']);

            $manager->persist($page);
        }

        $manager->flush(); //to get ref id populated
    }
}
