<?php

namespace App\Controller;

use App\Entity\Recette;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    /**
     * @Route("/recettes", name="recettes")
     */
    public function index(): Response
    {
        $arrRec = $this->getDoctrine()->getManager()->getRepository(Recette::class)->findAllJoinUser();
        //dd($arrRec);


        return $this->render('recette/index.html.twig', [
            'controller_name' => 'RecetteController',
            'recettes' => $arrRec,
            'imgs' => 'images/recette/'
        ]);
    }
    /**
     * @Route("/recette/{id}", name="recette", methods="GET")
     */
    public function recette(int $id): Response
    {
        $arrRec = $this->getDoctrine()->getManager()->getRepository(Recette::class)->findOneByIdJoinUser($id);
        //dd($arrRec);


        return $this->render('recette/vue.html.twig', [
            'controller_name' => 'RecetteController',
            'recette' => $arrRec,
            'imgs' => 'images/recette/'
        ]);
    }
}
