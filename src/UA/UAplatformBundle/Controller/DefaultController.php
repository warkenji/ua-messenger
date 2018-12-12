<?php

namespace UA\UAplatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UAplatformBundle:Default:index.html.twig');
    }
}
