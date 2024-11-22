<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\TempSensor\TestTempSensor;
use App\TempSensor\HttpTempSensor;
use App\TempSensor\Manager as TempSensorManager;

class TempSensorController extends AbstractController
{
    public function __construct(private TempSensorManager $tempSensorManager)
    {
    }

    #[Route("/temp", name: "temp")]
    public function temp(): Response
    {
        $sensors = array_map(function ($sensor) {
            return [
                "name" => $sensor->getName(),
                "temp" => $sensor->getTemp(),
            ];
        }, $this->tempSensorManager->getSensors());

        return $this->render("temp_sensors.html.twig", ["sensors" => $sensors]);
    }
}