<?php

class users
{

    private int $Id;
    private string $Mail;
    private string $Password;

    /**
     * @param int $Id
     * @param string $Mail
     * @param string $Password
     */
    public function __construct(int $Id, string $Mail, string $Password)
    {
        $this->Id = $Id;
        $this->Mail = $Mail;
        $this->Password = $Password;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->Id;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->Mail;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->Password;
    }


}