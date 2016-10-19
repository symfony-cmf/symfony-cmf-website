<?php

namespace AppBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\SeoBundle\Doctrine\Phpcr\SeoMetadata;
use Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadataInterface;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\SeoBundle\SitemapAwareInterface;
use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;

/**
 * @PHPCR\Document(referenceable=true, translator="child")
 *
 * @author Maximilian Berghoff <Maximilian.Berghoff@gmx.de>
 */
class SeoPage extends Page implements SeoAwareInterface, SitemapAwareInterface
{
    /**
     * @var SeoMetadata
     *
     * @PHPCR\Child
     */
    protected $seoMetadata;

    /**
     * @var bool
     *
     * @PHPCR\Boolean(property="visible_for_sitemap")
     */
    private $isVisibleForSitemap;

    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->seoMetadata = new SeoMetadata();
    }

    /**
     * Gets the SEO metadata for this content.
     *
     * @return SeoMetadataInterface
     */
    public function getSeoMetadata()
    {
        return $this->seoMetadata;
    }

    /**
     * Sets the SEO metadata for this content.
     *
     * This method is used by a listener, which converts the metadata to a
     * plain array in order to persist it and converts it back when the content
     * is fetched.
     *
     * @param array|SeoMetadataInterface $metadata
     */
    public function setSeoMetadata($metadata)
    {
        $this->seoMetadata = $metadata;
    }

    /**
     * Decision whether a document should be visible
     * in sitemap or not.
     *
     * @param $sitemap
     *
     * @return bool
     */
    public function isVisibleInSitemap($sitemap)
    {
        return $this->isVisibleForSitemap;
    }

    /**
     * @param boolean $isVisibleForSitemap
     */
    public function setIsVisibleForSitemap($isVisibleForSitemap)
    {
        $this->isVisibleForSitemap = $isVisibleForSitemap;
    }
}
