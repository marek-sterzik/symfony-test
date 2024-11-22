<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route("/test/{id}", name: "test")]
    public function test(string $id, Request $rq): Response
    {
        $text = $rq->query->get("text");
        $response = $this->render("test.html.twig", [
            "id" => $id,
            "text" => $text,
        ]);
        $response->setStatusCode(404);
        return $response;
    }

    #[Route("/redirect")]
    public function redirectController(): Response
    {
        return $this->redirect($this->generateUrl("test", ["id" => 30]));
        return $this->redirect("/test/20?text=10");
        return $this->redirectToRoute("test", ["id" => 30]);
    }
}