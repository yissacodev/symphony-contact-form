<?php

namespace App\Controller;

use App\Entity\ContactArea;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    private $db;

    public function __construct(EntityManagerInterface $db)
    {
        $this->db = $db;
    }

    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/form', name: 'app_form')]
    public function formManagment( Request $request ): Response
    {
        $user = new User();
        $form = $this->createForm( UserType::class, $user );        
        $form->handleRequest(($request));

        // print($request->query->get('mensaje'));
        // print($request->query->remove('mensaje'));

        if( $form->isSubmitted() && $form->isValid() ){
            $email = $form['email']->getData();
            $num = $this->db->getRepository(User::class)->registerPerDay( $email );

            if($num < 1){
                $this->db->persist($user);
                $this->db->flush();
                return $this->redirectToRoute('app_form', ['msg' => '200']);
            } else {
                return $this->redirectToRoute('app_form', ['msg' => '500']);
            }  
        }
        
        return $this->render('user/index.html.twig', [
            'form' => $form,
        ]); 
    }
}
