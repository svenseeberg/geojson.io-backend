<?php
namespace App\Controller;

use App\Entity\GeoJson;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GeoJsonController extends AbstractController
{
    #[Route('/geojson', name: 'GetGeoJson', method: 'GET')]
    public function get_geojson(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $geojson = new GeoJson();

        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));
        $response->headers->set('Content-Type', 'application/json');
    }

    #[Route('/geojson', name: 'PutGeoJson', method: 'PUT')]
    public function put_geojson(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $geojson = new GeoJson();

        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));
        $response->headers->set('Content-Type', 'application/json');
    }

    #[Route('/list', name: 'ListGeoJson')]
    public function list_geojson(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $geojson = new GeoJson();

        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));
        $response->headers->set('Content-Type', 'application/json');
    }
}
