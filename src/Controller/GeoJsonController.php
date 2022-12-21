<?php
namespace App\Controller;

use App\Entity\GeoJSON;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GeoJsonController extends AbstractController
{

    /**
     * @Route("/geojson/{id}", name="geojson")
     */
    public function get_geojson(GeoJSON $geojson): JsonResponse
    {
        return $this->json($geojson);
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
