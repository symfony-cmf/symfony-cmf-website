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
        $home = new MenuItem('Home', new MenuFactory());
        $home->setUri($item->getUri());
        $item->addChild($home);
        $home->moveToFirstPosition();
        return parent::render($item, $options);
    }

}
