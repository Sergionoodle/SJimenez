<?php

class countrylanguage
{

    private string $Language;

    /**
     * @param string $Language
     */
    public function __construct(string $Language)
    {
        $this->Language = $Language;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->Language;
    }


}