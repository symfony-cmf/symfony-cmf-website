<?php

namespace Cmf\MainBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\SimpleBlock;

/**
 * @PHPCR\Document(referenceable=true)
 */
class TalkBlock extends SimpleBlock
{
    /** @PHPCR\String */
    protected $link;

    /**
     * @PHPCR\PrePersist
     */
    public function prePersist()
    {
        $this->setSetting('template', 'CmfMainBundle:Block:block_talk.html.twig');
    }

    /**
     * @param string $url
     */
    public function setLink($url)
    {
        $this->link = $url;
    }

    /**
     * @return string|null
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the date and time when the talk will start
     *
     * @param \DateTime $date
     */
    public function setWhen(\DateTime $date)
    {
        $this->publishEndDate = $date;
    }

    /**
     * Get the date and time when the talk will start
     *
     * @return \DateTime|null
     */
    public function getWhen()
    {
        return $this->publishEndDate;
    }
} 