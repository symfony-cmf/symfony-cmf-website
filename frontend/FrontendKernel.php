<?php

require_once __DIR__.'/../src/autoload.php';

use Symfony\Framework\Kernel;
use Symfony\Components\DependencyInjection\Loader\YamlFileLoader as ContainerLoader;
use Symfony\Components\Routing\Loader\YamlFileLoader as RoutingLoader;

use Symfony\Framework\KernelBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\ZendBundle\ZendBundle;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Symfony\Bundle\DoctrineBundle\DoctrineBundle;
use Symfony\Bundle\DoctrineMigrationsBundle\DoctrineMigrationsBundle;
use Symfony\Bundle\DoctrineMongoDBBundle\DoctrineMongoDBBundle;
use Symfony\Bundle\PropelBundle\PropelBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Application\FrontendBundle\FrontendBundle;
use Symfony\Components\DependencyInjection\Loader\LoaderInterface;

class FrontendKernel extends Kernel
{
    public function registerRootDir()
    {
        return __DIR__;
    }

    public function registerBundles()
    {
        $bundles = array(
            new KernelBundle(),
            new FrameworkBundle(),

            // enable third-party bundles
            new ZendBundle(),
            new DoctrineBundle(),
            new DoctrineMigrationsBundle(),

            // enable application bundles
            new FrontendBundle(),
        );

        if ($this->isDebug()) {
        }

        return $bundles;
    }

    public function registerBundleDirs()
    {
        return array(
            'Application'        => __DIR__.'/../src/Application',
            'Bundle'             => __DIR__.'/../src/Bundle',
            'Symfony\\Framework' => __DIR__.'/../src/vendor/symfony/src/Symfony/Framework',
        );
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        return $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    public function registerRoutes(RoutingLoader $container)
    {
        return $loader->load(__DIR__.'/config/routing.yml');
    }
}
