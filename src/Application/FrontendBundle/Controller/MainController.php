<?php

namespace Application\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendBundle:Main:index');
    }

    public function getInvolvedAction()
    {
        return $this->render('FrontendBundle:Main:getInvolved');
    }

    public function aboutAction()
    {
        return $this->render('FrontendBundle:Main:about');
    }
}
