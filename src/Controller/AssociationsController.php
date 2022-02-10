<?php

namespace App\Controller;

use App\Entity\Action;
use App\Entity\Associations;
use App\Entity\User;
use App\Repository\AssociationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AssociationsController extends AbstractController
{

    /**
     * @Route("/associations/", name="associations" ) 
     */
    public function index(Request $Request, AssociationsRepository $repo, EntityManagerInterface $entityManager): response
    {


        return $this->render('associations/index.html.twig', [
            'user' => $this->getUser(),
            'associations' => $repo->findAllAssociations(),
        ]);
    }



}
