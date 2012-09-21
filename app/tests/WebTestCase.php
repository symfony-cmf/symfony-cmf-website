<?php

namespace Cmf;

use Liip\FunctionalTestBundle\Test\WebTestCase as BaseWebTestCase;
use Doctrine\Common\DataFixtures\Executor\PHPCRExecutor;
use Doctrine\Common\DataFixtures\Purger\PHPCRPurger;

abstract class WebTestCase extends BaseWebTestCase
{
    static protected $fixturesLoaded = false;

    public function setUp()
    {
        if (self::$fixturesLoaded) {
            return;
        }

        $this->loadFixtures(array(
            'Cmf\MainBundle\DataFixtures\PHPCR\LoadStaticData',
        ), null, 'doctrine_phpcr');

        self::$fixturesLoaded = true;
    }
}
