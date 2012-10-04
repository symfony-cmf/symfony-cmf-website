<?php

namespace Cmf\MainBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;

use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Cmf\Bundle\SimpleCmsBundle\Document\Page;

use Symfony\Cmf\Component\Routing\RouteAwareInterface;
use Symfony\Cmf\Bundle\RoutingExtraBundle\Document\Route;
use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishWorkflowInterface;

/**
 * @PHPCRODM\Document
 */
class NewsCollection extends Page
{
}
