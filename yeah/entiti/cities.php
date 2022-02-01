<?php

class cities
{
    private int $ID;
    private string $Name;

    /**
     * @param int $ID
     * @param string $Name
     */
    public function __construct(int $ID, string $Name)
    {
        $this->ID = $ID;
        $this->Name = $Name;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }



}