<?php

namespace Symfony\Cmf\Bundle\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendBundle:Main:index.html.twig');
    }

    public function getInvolvedAction()
    {
        return $this->render('FrontendBundle:Main:getInvolved.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('FrontendBundle:Main:about.html.twig');
    }
}
