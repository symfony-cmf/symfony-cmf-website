<?php
namespace Symfony\Cmf\Bundle\FrontendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('News', array('route' => 'news'));
        $menu->addChild('Get Started', array('route' => 'get_started'));
        $menu->addChild('Get Involved', array('route' => 'get_involved'));
        $menu->addChild('About', array('route' => 'about'));
        $menu->addChild('Wiki', array('uri' => 'http://wiki.github.com/symfony-cmf/symfony-cmf'));
        $menu->addChild('Demo', array('uri' => 'http://cmf.liip.ch'));

        return $menu;
    }
}
