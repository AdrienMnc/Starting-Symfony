<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use App\Entity\Property;
use Doctrine\Persistence\ManagerRegistry;


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

    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $property = new Property();
        $property->setTitle('Mon premier bien')
            ->setPrice(price: 200000)
            ->setRooms(rooms: 4)
            ->setBedrooms(bedrooms: 3)
            ->setDescription(description: 'Une petite description')
            ->setSurface(surface: 60)
            ->setFloor(floor: 4)
            ->setHeat(heat: 1)
            ->setCity(city: 'Nice')
            ->setAdress(adress: '6 rue cimiez')
            ->setPostalCode(postal_code: '06000');

        $entityManager->persist($property);
        $entityManager->flush();


        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
}
