<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Brand;
use App\Entity\Mobile;

class BrandController extends AbstractController
{
    /**
     * @Route("/brand/{id}", name="brand")
     */
    public function index($id): Response
    {

        $brand = $this->getDoctrine()->getRepository(Brand::class)->find($id);
        $brands = $this->getDoctrine()->getRepository(Brand::class)->findAll();

        $criteria = array("brand" => $brand);
        $mobiles = $this->getDoctrine()->getRepository(Mobile::class)->findBy($criteria);

        return $this->render('brand.html.twig', [
            'controller_name' => 'BrandController',
            'brand' => $brand,
            'mobiles' => $mobiles,
            'brands' => $brands,

        ]);
    }
}
