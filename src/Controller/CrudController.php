<?php

namespace App\Controller;

use App\Entity\GeoJSON;
use App\Form\GeoJSONType;
use App\Repository\GeoJSONRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/crud")
 */
class CrudController extends AbstractController
{
    /**
     * @Route("/", name="app_crud_index", methods={"GET"})
     */
    public function index(GeoJSONRepository $geoJSONRepository): Response
    {
        return $this->render('crud/index.html.twig', [
            'geo_j_s_o_ns' => $geoJSONRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_crud_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GeoJSONRepository $geoJSONRepository): Response
    {
        $geoJSON = new GeoJSON();
        $form = $this->createForm(GeoJSONType::class, $geoJSON);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $geoJSONRepository->add($geoJSON, true);

            return $this->redirectToRoute('app_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud/new.html.twig', [
            'geo_j_s_o_n' => $geoJSON,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_crud_show", methods={"GET"})
     */
    public function show(GeoJSON $geoJSON): Response
    {
        return $this->render('crud/show.html.twig', [
            'geo_j_s_o_n' => $geoJSON,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_crud_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, GeoJSON $geoJSON, GeoJSONRepository $geoJSONRepository): Response
    {
        $form = $this->createForm(GeoJSONType::class, $geoJSON);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $geoJSONRepository->add($geoJSON, true);

            return $this->redirectToRoute('app_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud/edit.html.twig', [
            'geo_j_s_o_n' => $geoJSON,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_crud_delete", methods={"POST"})
     */
    public function delete(Request $request, GeoJSON $geoJSON, GeoJSONRepository $geoJSONRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$geoJSON->getId(), $request->request->get('_token'))) {
            $geoJSONRepository->remove($geoJSON, true);
        }

        return $this->redirectToRoute('app_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
