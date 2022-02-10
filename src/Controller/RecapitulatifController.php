<?php

namespace App\Controller;

use App\Repository\ActionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecapitulatifController extends AbstractController
{
    /**
     * @Route("/recap", name="recapitulatif")
     */


    
    public function chosse(ActionRepository $repo): Response
    {

        return $this->render('recapitulatif/index.html.twig', [
            'actions' => $repo->findByUser($this->getUser()),
        ]);
    }
}
