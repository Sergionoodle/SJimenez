<?php
//Piensa que esto es un poco diferente al otro modelo
//Es decir que este no saca lista pero si tienes las funciones
//Practicamente iguales, es bueno separar para no tener un
//modelo monstruoso

//incluimos las clases necesarias para la pagina principal
include_once "../entidades/hoteles.php";
include_once "../entidades/datos_hoteles.php";
include_once "../basedatos/dbo.php";

class datos_hoteles_modelo
{
    //Creamos el inicio a la base de datos
    private dbo $basededatos;

    public function __construct()
    {
        $this->basededatos = new dbo();
    }

    //funcion para sacar los datos mediante un id
    public function pagina_principal_hoteles($id){
        //sentencia
        $sql = "SELECT * FROM hoteles WHERE id=".$id;
        //Abrimos la conexion
        $this->basededatos->default();
        //Ejecutamos la query
        $query = $this->basededatos->query($sql);
        //Cerramos la conexion
        $this->basededatos->close();
        //Hacemos el fetch assoc
        $resultado = $query->fetch_assoc();
        //Devolvemos el resultado
        $return = new hoteles($resultado['id'],$resultado['nombre_hotel'],$resultado['ubicacion'],$resultado['precio'],$resultado['puntuacion'], $this->get_datos_id($resultado['id_datos']));
        return $return;

    }

    //Funcion para sacar los datos de datos_hoteles por id
    public function get_datos_id($id)
    {
        $sql = "SELECT * FROM datos_hoteles WHERE id=".$id;
        $this->basededatos->default();
        $query = $this->basededatos->query($sql);
        $this->basededatos->close();
        $resultado = $query->fetch_assoc();
        $return = new datos_hoteles($resultado['id'],$resultado['imagen'],$resultado['video'],$resultado['descripcion']);
        return $return;
    }
}