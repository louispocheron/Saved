<?php

namespace App\Controller;

use App\Entity\Action;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RegistrationFormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PostDataActionController extends AbstractController
{
    /**
     * @Route("/saisie", name="post_data")
     */
    public function create(Request $request, EntityManagerInterface $entityManager)
    {
        $action = new Action();
        $action -> setUsers($this->getUser());

        $form = $this->createFormBuilder($action)
                     ->add('distance', NumberType::class, [
                            'attr' => [
                                'placeholder' => 'Distance en km',
                                'class' => 'form-control'
                            ]])  
                     ->add('villedepart', TextType::class, array('label' => 'Ville de départ'))
                     ->add('villearrive', TextType::class, array('label' => 'Ville de destination'))
                     ->add('date', DateType::class, [
                        'widget' => 'choice',
                                  'html5' => false,
                        ])
                     ->add('timestart', TimeType::class, [
                        'input'  => 'datetime_immutable',
                        'label' => 'Heure de départ',
                    ])
                     ->add('timeend',TimeType::class, [
                        'widget' => 'choice',
                        'input'  => 'datetime_immutable',
                        'label' => 'Heure de fin'
                    ])
                     ->add('hours', TimeType::class, [
                        'widget' => 'choice',
                        'input'  => 'datetime_immutable',
                        'label' => 'Durée'
                        ])
                     ->add('raison', TextType::class, array('label' => 'Raison'))
                     ->add('donation', NumberType::class, [
                            'attr' => [
                                'placeholder' => 'Montant en €',
                                'class' => 'form-control'
                            ]])
                     ->add('save', SubmitType::class, ['label' => 'Enregistrer'])


                     ->getForm();
        $form->handleRequest($request);	
        
        if ($form->isSubmitted()) {
            $form->get('villedepart')->getData();
            $entityManager->persist($action);
            $entityManager->flush();
            return $this->redirectToRoute('post_data');

        }
        return $this->render('post_data_action/index.html.twig', [
            'formAction' => $form->createView()
        ]);
}
}
