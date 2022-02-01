<?php

class countries
{

    private string $Code;
    private string $Name;
    private int $Population;
    private float $GNP;
    private int $Capital;
    private $users;

    private array $numLang;
    private array $numCities;

    /**
     * @param string $Code
     * @param string $Name
     * @param int $Population
     * @param float $GNP
     * @param int $Capital
     * @param $users
     * @param array $numLang
     * @param array $numCities
     */
    public function __construct(string $Code, string $Name, int $Population, float $GNP, int $Capital, $users, array $numLang, array $numCities)
    {
        $this->Code = $Code;
        $this->Name = $Name;
        $this->Population = $Population;
        $this->GNP = $GNP;
        $this->Capital = $Capital;
        $this->users = $users;
        $this->numLang = $numLang;
        $this->numCities = $numCities;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->Code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @return int
     */
    public function getPopulation(): int
    {
        return $this->Population;
    }

    /**
     * @return float
     */
    public function getGNP(): float
    {
        return $this->GNP;
    }

    /**
     * @return int
     */
    public function getCapital(): int
    {
        return $this->Capital;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @return array
     */
    public function getNumLang(): array
    {
        return $this->numLang;
    }

    /**
     * @return array
     */
    public function getNumCities(): array
    {
        return $this->numCities;
    }


}