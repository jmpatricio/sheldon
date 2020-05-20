<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicHomeController extends AbstractController
{
    /**
     * @Route("/", name="public_home")
     */
    public function index()
    {
        return $this->render('public_home/index.html.twig', [
            'controller_name' => 'PublicHomeController',
        ]);
    }
}
