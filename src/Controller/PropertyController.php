<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use App\Entity\Property;
use phpDocumentor\Reflection\DocBlock\Description;

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

        $property = new Property();
        $property->setTitle('Mon premier bien')
            ->setPrice(price: 200000)
            ->setRooms(rooms: 4)
            ->setBedrooms(bedrooms: 3)
            ->setDescription(description: 'Une petite description')
            ->setSurface(surface: 60)
            ->setFloor(floor: 4)
            ->setHeat(heat: 1);


        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
}
