<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\TempSensor\Manager as TempManager;

class TempController extends AbstractController
{
    public function __construct(private TempManager $tempManager)
    {
    }

    #[Route("/temp", name: "temp")]
    public function temp(): Response
    {
        $sensors = $this->tempManager->getSensors();
        $sensors = array_map(function ($sensor) {
            return $sensor->getTempData();
        }, $sensors);
        return $this->render("sensors.html.twig", [
            "sensors" => $sensors,
        ]);
    }


}