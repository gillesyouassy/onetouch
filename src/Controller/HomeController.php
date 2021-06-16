<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Brand;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        
        $brands = $this->getDoctrine()->getRepository(Brand::class)->findAll();

        return $this->render('onetech.html.twig', [
            'controller_name' => 'HomeController',
            'brands' => $brands,
          
            

        ]);
    }
}
