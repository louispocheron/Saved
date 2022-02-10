<?php

namespace App\Controller;

use App\Entity\Associations;
use App\Form\RegistrationFormType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class RegisterAssociationsController extends AbstractController
{
    /**
     * @Route("/register/associations", name="register_associations")
     */

    public function CreateAssociation(Request $request, EntityManagerInterface $EntityManagerInterface)
    {

        $association = new Associations();
        // $association -> setUsers($this->getUser());

        $form = $this->createFormBuilder($association)
                        ->add('name', TextType::class, [
                            'label' => 'Nom de l\'association' 
                            ])
                        ->add('description', TextType::class, [
                            'label' => 'Description'
                            ])
                        ->add('logo', FileType::class, [
                        'label' => 'logo de l\'association',
                        'multiple' => false,
                        'mapped' => false,
                        'constraints' => [   
                            new Assert\File([
                                'maxSize' => '1024k',
                                'mimeTypes' => [
                                    'image/jpeg',
                                    'image/png',
                                    'image/jpg',
                                ],
                                'mimeTypesMessage' => 'Uploadez une image valide',
                            ])
                        ]])
                        
                        ->add('submit', SubmitType::class, array('label' => 'Enregistrer'))
                        ->getForm();
        $form->handleRequest($request);



        // A LA SOUMISSION DU FORMULAIRE 
        if($form->isSubmitted() && $form->isValid()){
            // RECUPERATION DE L'IMAGE
            $file = $form->get('logo')->getData();
            // GENERATION DU NOM DU FICHIER
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // DEPLACEMENT DU FICHIER VERS LE DESTINATION
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            // ENREGISTREMENT DU NOM DU FICHIER DANS L'ENTITE
            $association->setLogo($fileName);
            // ENREGISTREMENT DE L'ENTITE DANS LA BASE DE DONNEES
            $EntityManagerInterface->persist($association);
            $EntityManagerInterface->flush();
            // REDIRECTION VERS LA PAGE D'ACCUEIL
            return $this->redirectToRoute('associations');
        }

        return $this->render('register_associations/index.html.twig', [
            'formAssoc' => $form->createView()
        ]);
    }
}
