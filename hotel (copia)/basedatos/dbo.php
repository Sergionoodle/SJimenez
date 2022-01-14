<?php

//Extendemos la base de datos de mysqli
class dbo extends mysqli
{

    //Creamos las variables donde colocamos los credenciales de la sesion a la base de datos
    private string $hostname = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "hoteles";

    //Funcion que llama a la funcion de conexion
    public function default(){
        $this->local();
    }


    //Creamos la funcion que nos hará conecsion
    public function local(){

        //llamamos parent connect y le introducimos los credenciales
        parent::connect($this->hostname,$this->username,$this->password,$this->database);

        //Si da error que nos salte un mensaje
        if(mysqli_connect_error()){
            die("No se ha podido conectar a la base de datos".mysqli_connect_error());
        }
    }
}