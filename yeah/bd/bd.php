<?php

class bd extends mysqli
{

    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $base = "examen_3";

    public function default(){
        $this->local();
    }

    public function local(){
        parent::connect($this->host, $this->user, $this->pass, $this->base);

        if(mysqli_connect_error()){
            die("Error en la base de datos");
        }
    }
}