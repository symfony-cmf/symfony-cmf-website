<?php

namespace Cmf;

use Liip\FunctionalTestBundle\Test\WebTestCase as BaseWebTestCase;

abstract class WebTestCase extends BaseWebTestCase
{
    protected static $fixturesLoaded = false;

    public function setUp()
    {
        if (self::$fixturesLoaded) {
            return;
        }

        $this->loadFixtures(array(
            'AppBundle\DataFixtures\PHPCR\LoadStaticData',
        ), null, 'doctrine_phpcr');

        self::$fixturesLoaded = true;
    }
}
