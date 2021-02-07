<?php

namespace App\Entity;

use App\Repository\WeatherFinalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherFinalRepository::class)
 */
class WeatherFinal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loctime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temp_c;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temp_f;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $weatherforecast;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wind_mph;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wind_degree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wind_dir;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pressure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $humidity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $feelslike_c;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vis_km;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLoctime(): ?string
    {
        return $this->loctime;
    }

    public function setLoctime(string $loctime): self
    {
        $this->loctime = $loctime;

        return $this;
    }

    public function getTempC(): ?string
    {
        return $this->temp_c;
    }

    public function setTempC(string $temp_c): self
    {
        $this->temp_c = $temp_c;

        return $this;
    }

    public function getTempF(): ?string
    {
        return $this->temp_f;
    }

    public function setTempF(string $temp_f): self
    {
        $this->temp_f = $temp_f;

        return $this;
    }

    public function getWeatherforecast(): ?string
    {
        return $this->weatherforecast;
    }

    public function setWeatherforecast(string $weatherforecast): self
    {
        $this->weatherforecast = $weatherforecast;

        return $this;
    }

    public function getWindMph(): ?string
    {
        return $this->wind_mph;
    }

    public function setWindMph(string $wind_mph): self
    {
        $this->wind_mph = $wind_mph;

        return $this;
    }

    public function getWindDegree(): ?string
    {
        return $this->wind_degree;
    }

    public function setWindDegree(string $wind_degree): self
    {
        $this->wind_degree = $wind_degree;

        return $this;
    }

    public function getWindDir(): ?string
    {
        return $this->wind_dir;
    }

    public function setWindDir(string $wind_dir): self
    {
        $this->wind_dir = $wind_dir;

        return $this;
    }

    public function getPressure(): ?string
    {
        return $this->pressure;
    }

    public function setPressure(string $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function setHumidity(string $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getFeelslikeC(): ?string
    {
        return $this->feelslike_c;
    }

    public function setFeelslikeC(string $feelslike_c): self
    {
        $this->feelslike_c = $feelslike_c;

        return $this;
    }

    public function getVisKm(): ?string
    {
        return $this->vis_km;
    }

    public function setVisKm(string $vis_km): self
    {
        $this->vis_km = $vis_km;

        return $this;
    }
}
