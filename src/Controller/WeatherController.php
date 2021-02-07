<?php

namespace App\Controller;

use App\Entity\Wetherbox;
use App\Entity\WeatherFinal;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\WetherboxRepository;
use App\Repository\WeatherFinalRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;


class WeatherController extends AbstractController
{

    /**
     * @Route ("/weatherShow/{city_founder}", name = "wether_show")
     */

    public function weatherShow(string $city_founder) : Response {

        $weatherInfo = file_get_contents('http://api.weatherapi.com/v1/current.json?key=bfb115dd71b14688a0f122036210202&q='.$city_founder);
        $weatherInfo = json_decode($weatherInfo, true);
        echo '<pre>';
        print_r($weatherInfo);
        echo '<pre>';

        return new Response('Weather');
    }


    /**
     * @Route ("/weatherShow/resp/{city}", name = "weather_resp")
     */

    public function weatherResp(string $city, ValidatorInterface $validator) : Response {
        $entityManager = $this->getDoctrine()->getManager();

        $weatherbox = new Wetherbox();
        $weatherInf = file_get_contents('http://api.weatherapi.com/v1/current.json?key=bfb115dd71b14688a0f122036210202&q='.$city);
        $weatherInf = json_decode($weatherInf, true);
        $weatherbox -> setWeatherjson($weatherInf);

        $entityManager->persist($weatherbox);

        $entityManager->flush();

        $errors = $validator->validate($weatherbox);
        if (count($errors) > 0)
        {
            return new Response((string) $errors, 400);
        }

        return new Response('Success check db');

    }

    /**
     * @Route ("/weatherFinalShowByID/{id}", name = "show_final_id")
     */

    public function showFinalById(int $id) : Response
    {
        $weatherF = $this->getDoctrine()
            ->getRepository(WeatherFinal::class)
            ->finalShowByID($id);

        if (!$weatherF) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        echo '<pre>';
        print_r($weatherF);
        echo '<pre>';

        return new Response("Result");
    }

    /**
     * @Route ("/weatherFinalShowMax/JSON", name = "show_final_max_JSON")
     */

    public function showFinalMaxJSON() : Response
    {
        $weatherF = $this->getDoctrine()
            ->getRepository(WeatherFinal::class)
            ->finalShowMAX();


        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $weatherF = $serializer->serialize($weatherF, 'json');
        echo '<pre>';
        print_r($weatherF);
        echo '<pre>';

        return new Response('Res');
    }

    /**
     * @Route ("/weatherFinalShowMax", name = "show_final_max")
     */

    public function showFinalMax() : Response
    {
        $weatherF = $this->getDoctrine()
            ->getRepository(WeatherFinal::class)
            ->finalShowMAX();


        echo '<pre>';
        print_r($weatherF);
        echo '<pre>';

        return new Response('Res');
    }

    /**
     * @Route ("/weatherFinalCity/{town}", name="find_by_city")
     */

    public function weatherFinalCity(string $town) : Response {
        $weatherF = $this->getDoctrine()
            ->getRepository(WeatherFinal::class)
            ->finalShowCITY($town);


        echo '<pre>';
        print_r($weatherF);
        echo '<pre>';

        return new Response('Res');
    }


    /**
     * @Route ("/weatherShow/show/{id}", name = "show_by_id")
     */
    public function showByID(int $id, Wetherbox $wetherbox) : Response
    {
        if (!$wetherbox) {
            throw $this->createNotFoundException(
                'No product found for id ' . $wetherbox.id
            );
        }

        $wetherbox->getWeatherjson();

        echo '<pre>';
        print_r($wetherbox);
        echo '<pre>';

        return new Response('Check: ');
    }

}