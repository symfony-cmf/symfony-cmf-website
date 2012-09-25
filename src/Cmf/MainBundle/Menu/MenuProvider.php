<?php

namespace Cmf\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use \Knp\Menu\MenuItem;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class MenuProvider extends \Symfony\Cmf\Bundle\MenuBundle\Provider\PHPCRMenuProvider
{
    public function get($name, array $options = array())
    {
       if ('simple' == $name)
       {
           //get the internal pages of the website
           $menu = parent::get($name, $options);

           //Home menu item
           $item = new MenuItem('Home', $this->factory);
           $item->setUri($menu->getUri());
           $menu->addChild($item);
           $item->moveToFirstPosition();
           //Docs menu item
           $item = new MenuItem('Docs', $this->factory);
           $item->setUri('http://symfony-cmf.readthedocs.org');
           $menu->addChild($item);
           //Wiki menu item
           $item = new MenuItem('Wiki', $this->factory);
           $item->setUri('http://wiki.github.com/symfony-cmf/symfony-cmf');
           $menu->addChild($item);
           //Demo menu item
           $item = new MenuItem('Demo', $this->factory);
           $item->setUri('http://cmf.liip.ch/');
           $menu->addChild($item);

           return $menu;
       }
    }
}