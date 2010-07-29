<?php

namespace Application\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller;

class FrontendController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendBundle:Frontend:index');
    }

    public function get_involvedAction()
    {
        return $this->render('FrontendBundle:Frontend:get_involved');
    }

    public function aboutAction()
    {
        return $this->render('FrontendBundle:Frontend:about');
    }
}