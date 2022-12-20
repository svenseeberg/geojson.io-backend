<?php
namespace App\Controller;

use App\Entity\GeoJSON;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GeoJsonController extends AbstractController
{
    /**
    * @Route("/geojson", name="geojson")
    */
    public function get_geojson(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $geojson = new GeoJSON();

        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
    * @Route("/", name="listgeojson")
    */
    public function list_geojson(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $geojson = new GeoJSON();

        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
