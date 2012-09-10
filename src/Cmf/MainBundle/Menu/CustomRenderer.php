<?php

/*
 * This file is part of the Cmf\MainBundle
 *
 * (c) Lukas Kahwe Smith <smith@pooteeweet.org>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Cmf\MainBundle\Menu;

use \Knp\Menu\Renderer\TwigRenderer;
use \Knp\Menu\ItemInterface;
use Knp\Menu\MenuFactory;
use \Knp\Menu\MenuItem;

class CustomRenderer extends TwigRenderer
{

    public function render(ItemInterface $item, array $options = array())
    {
        $menuFactory = new MenuFactory();
        $home = new MenuItem('Home', $menuFactory);
        $home->setUri($item->getUri());
        $item->addChild($home);
        $home->moveToFirstPosition();

        $docs = new MenuItem('Docs', $menuFactory);
        $docs->setUri('http://symfony-cmf.readthedocs.org');
        $item->addChild($docs);

        $wiki = new MenuItem('Wiki', $menuFactory);
        $wiki->setUri('http://wiki.github.com/symfony-cmf/symfony-cmf');
        $item->addChild($wiki);

        $demo = new MenuItem('Demo', $menuFactory);
        $demo->setUri('http://cmf.liip.ch/');
        $item->addChild($demo);

        return parent::render($item, $options);
    }
}