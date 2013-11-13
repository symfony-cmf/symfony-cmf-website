<?php

namespace Cmf\MainBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

/**
 * @PHPCR\Document(referenceable=true)
 */
class EventsBlock extends AbstractBlock
{
    public function getType()
    {
        return 'cmf_main.block.events';
    }
} 