<?php

namespace Symfony\Cmf\Bundle\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendBundle:Main:index.html.twig');
    }

    public function getNewsAction()
    {
        return $this->render('FrontendBundle:Main:news.html.twig');
    }

    public function getInvolvedAction()
    {
        return $this->render('FrontendBundle:Main:getInvolved.html.twig');
    }

    public function getStartedAction()
    {
        return $this->render('FrontendBundle:Main:getStarted.html.twig');
    }

    public function newsAction()
    {
        return $this->render('FrontendBundle:Main:news.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('FrontendBundle:Main:about.html.twig');
    }
}
