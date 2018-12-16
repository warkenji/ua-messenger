<?php


namespace UA\UAplatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UA\UAplatformBundle\Entity\Groupe;
use UA\UserBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
use UA\UAplatformBundle\Form\GroupeType;


class GroupeController extends Controller
{
    public function indexAction()
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('UAplatformBundle:Groupe');

        $groupe = $repository->findAll();

        return $this->render('UAplatformBundle:Groupe:index.html.twig',array ('groupe' => $groupe));
    }

    public function addAction(Request $request)
    {

        $groupe= new Groupe();


        $form= $this->get('form.factory')->create(GroupeType::class,$groupe);//Création du formulaire.

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $groupe->addUtilisateur($this->getUser());
            $em->persist($groupe);
            $em->flush();

        }
        return $this->render('UAplatformBundle:Groupe:add.html.twig',array('form'=>$form->createView(),));

    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $groupe = $em->getRepository('UAplatformBundle:Groupe')->find($id);

        if (null === $groupe) {
            throw new NotFoundHttpException("Le groupe d'id ".$id." n'existe pas.");
        }

        $form=  $this->get('form.factory')->create(GroupeType::class,$groupe);//Création du formulaire.

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            // Inutile de persister ici, Doctrine connait déjà notre annonce
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Groupe bien modifiée.');
        }

        return $this->render('UAplatformBundle:Groupe:edit.html.twig', array(
            'goupe' => $groupe,
            'form'   => $form->createView(),
        ));
    }

    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('UAplatformBundle:Groupe')->find($id);
        if (null === $groupe)
        {
            throw new NotFoundHttpException("Le groupe d'id ".$id." n'existe pas.");
        }
        $em->remove($groupe);
        $em->flush();

        return $this->redirectToRoute('ua_platform_groupe_index');
    }
    public function add_in_groupAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('UAplatformBundle:Groupe')->find($id);
        $groupe->addUtilisateur($this->getUser());
        $em->flush();

        return $this->redirectToRoute('ua_platform_groupe_index');
    }

    public function viewAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $groupe=$em->getRepository('UAplatformBundle:Groupe')->find($id);
        $utilisateur=$em->getRepository('UAplatformBundle:Groupe')->display_user($id);
        return $this->render('UAplatformBundle:Groupe:view.html.twig',array('groupe'=>$groupe,'utilisateurs'=>$utilisateur[0]->getUtilisateurs()));


    }



}
