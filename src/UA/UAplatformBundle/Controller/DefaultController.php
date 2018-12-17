<?php

namespace UA\UAplatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();
        $groupe=$em->getRepository('UAplatformBundle:Groupe')->findBy(array('public'=>true));
        return $this->render('UAplatformBundle:Default:index.html.twig', array('groupePublic' => $groupe));
    }
}
