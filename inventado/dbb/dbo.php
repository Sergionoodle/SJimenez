<?php

class dbo extends mysqli
{

    private string $host = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $data = "objetos";

    public function default(){
        $this->local();
    }

    public function local(){
        parent::connect($this->host, $this->user, $this->password, $this->data);

        if(mysqli_connect_errno()){
            die("ERROR AL BASEDEDATEAR");
        }
    }
}