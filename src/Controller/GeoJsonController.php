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
            $entityManager = $this->getDoctrine()->getManager();
            $payload = json_decode($request->getContent(), true);
            $geojson->setLastChanged(new \DateTime('now'));
            $geojson->setWkt($payload["wkt"]);
            $geojson->setGeoJson($payload["geojson"]);
            $entityManager->flush();
        }
        return $this->json($geojson);
    }

    /**
     * @Route("/geojson/", name="listgeojson")
     */
    public function list_geojson(Request $request, GeoJSONRepository $geoJSONRepository): JsonResponse
    {
        return $this->json($geoJSONRepository->findAll());
    }
}
