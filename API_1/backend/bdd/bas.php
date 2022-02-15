<?php

class bas extends mysqli
{
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $dbb = "hoteles";

    public function default(){
        $this->local();
    }

    public function local(){

        parent::connect($this->host, $this->user, $this->pass, $this->dbb);

        if(mysqli_connect_error()){
            die("Fallo al crear la base de datos");
        }
    }

}