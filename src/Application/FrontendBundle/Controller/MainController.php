<?php

namespace Application\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendBundle:Main:index');
    }

    public function get_involvedAction()
    {
        return $this->render('FrontendBundle:Main:get_involved');
    }

    public function aboutAction()
    {
        return $this->render('FrontendBundle:Main:about');
    }
}
