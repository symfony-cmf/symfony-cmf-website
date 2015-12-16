<?php

namespace AppBundle\Menu;

use Knp\Menu\MenuItem;
use Symfony\Cmf\Bundle\MenuBundle\Provider\PhpcrMenuProvider;

class MenuProvider extends PhpcrMenuProvider
{
    public function get($name, array $options = array())
    {
        //get the internal pages of the website
        $menu = parent::get($name, $options);

        if ($name === 'simple') {
            //Home menu item
            $item = new MenuItem('Home', $this->factory);
            $item->setUri($menu->getUri());
            $menu->addChild($item);
            $item->moveToFirstPosition();
        }

        return $menu;
    }
}
