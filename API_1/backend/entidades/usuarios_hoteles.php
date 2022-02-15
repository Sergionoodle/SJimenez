<?php

class usuarios_hoteles
{

    public int $id;
    public string $email;
    public string $password;
    public string $usuario;

    /**
     * @param int $id
     * @param string $email
     * @param string $password
     * @param string $usuario
     */
    public function __construct(int $id, string $email, string $password, string $usuario)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->usuario = $usuario;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUsuario(): string
    {
        return $this->usuario;
    }

}