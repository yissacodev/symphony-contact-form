<?php

namespace App\Controller;

use App\Entity\ContactArea;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactAreaController extends AbstractController
{
    #[Route('/contactarea', name: 'app_contact_area')]
    public function index(): Response
    {
        return $this->render('contact_area/index.html.twig', [
            'controller_name' => 'ContactAreaController',
        ]);
    }
}
