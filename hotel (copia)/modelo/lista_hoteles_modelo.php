<?php

//Incluimos todas las clases necesarias para el listado
include_once "../entidades/hoteles.php";
            //Dos puntos para ir a "principal", vamos a entidades y buscamos el php que necesitamos
include_once "../entidades/datos_hoteles.php";
include_once "../basedatos/dbo.php";

class lista_hoteles_modelo
{

    //Hacemos la conexion a la base de datos
    private dbo $basededatos;

    //Creamos la funcion para la conexion
    public function __construct()
    {
        $this->basededatos = new dbo();
    }

    //Creamos la funcion para recoger los datos del id_datos
    public function get_id_datos($id)
    {
        //Hacemos la query
        $sql = "SELECT * FROM datos_hoteles WHERE id=".$id;
        //Abrimos la conexion
        $this->basededatos->default();
        //Introducimos la query
        $query = $this->basededatos->query($sql);
        //Cerramos la conexion
        $this->basededatos->close();
        //Pasamos el resultado
        $resultado = $query->fetch_assoc();
        //Hacemos el resultado
        $return = new datos_hoteles($resultado['id'],$resultado['imagen'],$resultado['video'],$resultado['descripcion']);
        //Hacemos el return
        return $return;
    }

    //Hacemos una funcion que nos saque el listado de hoteles
    public function listado_hoteles(){
        //Query
        $sql = "SELECT * FROM hoteles";
        //Abrimos la conexion
        $this->basededatos->default();
        //Hacemos ejecutar la query
        $query = $this->basededatos->query($sql);
        //Cerramos la sesion
        $this->basededatos->close();
        //Creamos una array
        $return = array();
        //bucle para meter el resultado en una array

        while ($resultado = $query->fetch_assoc()){
            $return[] = new hoteles($resultado['id'],$resultado['nombre_hotel'],$resultado['ubicacion'],$resultado['precio'],$resultado['puntuacion'], $this->get_id_datos($resultado['id_datos']));
        }
        //Return del resultado
        return $return;
    }
}