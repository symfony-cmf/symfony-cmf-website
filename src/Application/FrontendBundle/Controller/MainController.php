<?php

namespace Application\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendBundle:Main:index.twig');
    }

    public function getInvolvedAction()
    {
        return $this->render('FrontendBundle:Main:getInvolved.twig');
    }

    public function aboutAction()
    {
        return $this->render('FrontendBundle:Main:about.twig');
    }

    /**
     * Renders the navigation
     *
     * @return Response
     */
    public function navigationAction()
    {
        $current = $this->container->get('request')->attributes->get('_route');

        return $this->render('FrontendBundle:Main:navigation.php', array('current' => $current));
    }
}
