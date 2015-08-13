<?php

namespace AppBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

/**
 * @PHPCR\Document(referenceable=true)
 */
class EventsBlock extends AbstractBlock
{
    public function getType()
    {
        return 'app.block.events';
    }
}
