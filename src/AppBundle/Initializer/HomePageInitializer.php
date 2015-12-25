<?php

namespace AppBundle\Initializer;

use PHPCR\Util\NodeHelper;
use PHPCR\Util\PathHelper;

use Doctrine\Bundle\PHPCRBundle\Initializer\InitializerInterface;
use Doctrine\ODM\PHPCR\DocumentManager;

use Doctrine\Bundle\PHPCRBundle\ManagerRegistry;

/**
 * We need to overwrite the original simple cms initializer to set the right seo page class.
 *
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class HomePageInitializer implements InitializerInterface
{
    private $basePath;
    private $documentClass;

    public function __construct($basePath, $documentClass)
    {
        $this->basePath = $basePath;
        $this->documentClass = $documentClass;
    }

    /**
     * {@inheritDoc}
     */
    public function init(ManagerRegistry $registry)
    {
        /** @var $dm DocumentManager */
        $dm = $registry->getManagerForClass('AppBundle\Document\SeoPage');
        if ($dm->find(null, $this->basePath)) {
            return;
        }

        $session = $dm->getPhpcrSession();
        NodeHelper::createPath($session, PathHelper::getParentPath($this->basePath));

        /** @var \AppBundle\Document\SeoPage $page */
        $page = new $this->documentClass;
        $page->setId($this->basePath);
        $page->setLabel('Home');
        $page->setTitle('Homepage');
        $page->setBody('Autocreated Homepage');
        $page->setIsVisibleForSitemap(true);

        $dm->persist($page);
        $dm->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'AppBundle Homepage';
    }
}
