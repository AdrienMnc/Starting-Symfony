<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


class PropertyController extends AbstractController
{

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    public function index(): Response
    {

        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
}
