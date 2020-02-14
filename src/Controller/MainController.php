<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'Ricardo',
        ]);
    }

    /**
     * @Route("/custom:{id}", name="custom")
     */
    public function custom($id)
    {
        return $this->render('main/custom.html.twig', [
            'name' => $id,
        ]);
    }
}
