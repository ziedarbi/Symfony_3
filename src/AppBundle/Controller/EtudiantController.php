<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etudiant;
use AppBundle\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class EtudiantController extends Controller
{

    /**
     * @Route("/ajoutetudiant", name="ajoutetudiant")
     */
    public function ajoutEtudiantAction (Request $request)
    {

        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        // add form db ;)
        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em ->persist($etudiant);
            $em ->flush();
        }

        return $this->render('Etudiant/AjoutEtudiant.html.twig', array('form' => $form->createView()));

    }
    /**
     * @Route("/afficheretudiant", name="afficheretudiant")
     */
    public function afficherEtudiantAction(){

        $em = $this->getDoctrine()->getManager();
        $etudiant = $em->getRepository("AppBundle:Etudiant")->findAll();
        return $this->render('Etudiant/AfficherEtudiant.html.twig', array('etudiant'=>$etudiant));
    }
}
