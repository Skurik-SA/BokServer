<?php

namespace App\Command;

use MongoDB\Driver\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\WeatherFinal;
use App\Repository\WeatherFinalRepository;


class WeatherCommand extends ContainerAwareCommand
{

    protected static $defaultName = 'weather:check';

    protected function configure()
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {


        $this->cityLoader('Vladivostok');
        $this->cityLoader('Moscow');
        $this->cityLoader('London');
        $this->cityLoader('New-York');
        $this->cityLoader('Los-Angeles');

    }

    public function cityLoader(string $city)
    {
        $entityManager = $this->getContainer()->get('doctrine')->getManager();

        $output = file_get_contents('http://api.weatherapi.com/v1/current.json?key=bfb115dd71b14688a0f122036210202&q='.$city);

        echo($output);

        echo('\n');
        echo('\n');
        echo('\n');

        $weatherInfo = json_decode($output, true);
        $weatherClass = new WeatherFinal();
        $weatherClass->setCity($weatherInfo['location']['name']);
        $weatherClass->setRegion($weatherInfo['location']['region']);
        $weatherClass->setCountry($weatherInfo['location']['country']);
        $weatherClass->setLoctime($weatherInfo['location']['localtime']);

        $weatherClass->setTempC($weatherInfo['current']['temp_c']);
        $weatherClass->setTempF($weatherInfo['current']['temp_c']);
        $weatherClass->setWeatherforecast($weatherInfo['current']['condition']['text']);
        $weatherClass->setWindMph($weatherInfo['current']['wind_mph']);
        $weatherClass->setWindDegree($weatherInfo['current']['wind_degree']);
        $weatherClass->setWindDir($weatherInfo['current']['wind_dir']);
        $weatherClass->setPressure($weatherInfo['current']['pressure_mb']);
        $weatherClass->setHumidity($weatherInfo['current']['humidity']);
        $weatherClass->setFeelslikeC($weatherInfo['current']['feelslike_c']);
        $weatherClass->setVisKm($weatherInfo['current']['vis_km']);

        $entityManager->persist($weatherClass);
        $entityManager->flush();
    }
}