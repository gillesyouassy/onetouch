<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Brand;
use App\Entity\Mobile;

class MobileController extends AbstractController
{
    /**
     * @Route("/mobile/{id}", name="mobile")
     */
    public function index($id): Response
    {

        $brands = $this->getDoctrine()->getRepository(Brand::class)->findAll();
        
        $mobile = $this->getDoctrine()->getRepository(Mobile::class)->find($id);
        $brand = $mobile->getBrand();
        $criteria = array("brand" => $brand);
        $mobiles = $this->getDoctrine()->getRepository(Mobile::class)->findBy($criteria);

        return $this->render('mobile/index.html.twig', [
            'controller_name' => 'MobileController',
            'mobile' => $mobile,
            'mobiles' => $mobiles,
            'brands' => $brands,
            'brand' => $brand,
            

        ]);
    }
}
