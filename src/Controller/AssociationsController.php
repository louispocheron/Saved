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

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        $associations = $em->getRepository(Associations::class)->find('12');
        // // dd($associations);
        // $associations->addUser($user);
        // $em->persist($associations);
        // $em->flush();


        $user->addAssociationId($associations);
        $em->persist($user);
        $em->flush();


        


        // $user->addAssociationId($associations);

        // $entityManager->persist($associations);
        // $entityManager->flush();    
        
        
        return $this->render('associations/index.html.twig', [
            'user' => $repo->findAssociationByUser($user),
            'bruh' => $associations,
            'associations' => $repo->findAll(),
        ]);
    }
    
    public function userChooseAssociation()
    {
     
    }



}
