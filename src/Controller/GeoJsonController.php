<?php
namespace App\Controller;

use App\Entity\GeoJSON;
use App\Repository\GeoJSONRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GeoJsonController extends AbstractController
{

    /**
     * @Route("/geojson/{id}", name="geojson")
     */
    public function geojson(Request $request, GeoJSON $geojson, GeoJSONRepository $geoJSONRepository): JsonResponse
    {
        if ($request->isMethod('put') || $request->isMethod('post')) {
            $payload = json_decode($request->getContent(), true);
            $geojson->lastChanged = date('c', time());;
            $geojson->wkt = $payload["wkt"];
            $geojson->geojson = $payload["geojson"];
            $geoJSONRepository->add($geojson, true);
        }
        return $this->json($geojson);
    }

    /**
    * @Route("/geojson", name="listgeojson")
    */
    public function list_geojson(Request $request, GeoJSONRepository $geoJSONRepository): JsonResponse
    {
        return $this->json($geoJSONRepository->findAll());
    }
}
