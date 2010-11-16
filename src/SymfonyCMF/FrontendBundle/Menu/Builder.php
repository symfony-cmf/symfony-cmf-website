<?php
namespace SymfonyCMF\FrontendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('Get Involved', array('route' => 'get_involved'));
        $menu->addChild('About', array('route' => 'about'));
        $menu->addChild('Wiki', array('uri' => 'http://wiki.github.com/symfony-cmf/symfony-cmf'));

        return $menu;
    }
}