<?php
//Incluimos las clases creadas con anterioridad
include ("pedido.php");
include ("detalles.php");

//Hacemos la conexion
$localhost = "localhost";
$nombreuser = "root";
$password = "";
$basededatos ="jardineria";
$conn = new mysqli($localhost, $nombreuser, $password, $basededatos);

if($conn->error){
    echo "No se ha podido conectar con las base de datos";
}

//Creamos una funcion que nos meta en una array la query
function sqlproductos(){
    global $conn;
    $contador = 0;
    $array[] = "";

    $sql = "SELECT `CodigoProducto`,`Nombre`,`Gama`,`Dimensiones`,`Descripcion` FROM `productos`;";

    $resultado = $conn->query($sql);
    while ($r = $resultado->fetch_assoc()){
        $array[$contador] = $r;
        $contador++;
    }
    return $array;
}

//pasamos la query a una variable
$productos = sqlproductos();

//Ahora creamos la otra funcion
function sqlinnerjoin(){
    global $conn;
    $contador = 0;
    $array[] = "";
    $sql = "SELECT  p.CodigoProducto,p.Nombre,d.Cantidad FROM DetallePedidos as d \n"

        . "INNER JOIN Productos as P on p.CodigoProducto = d.CodigoProducto;";
    $resultado = $conn->query($sql);
    while ($r = $resultado->fetch_assoc()){
        $array[$contador] = $r;
        $contador++;
    }
    return $array;
}

//Ahora pasamos a una variable el resultado de la funcion
$detallesproducto = sqlinnerjoin();

//Ahora toca pasarlo a objetos
function obProducto(){
    global $productos;
    $contador = 0;
    $product[] = "";

    foreach ($productos as $producto){
        $product[$contador] = new pedido($producto['CodigoProducto'],$producto['Nombre'],$producto['Gama'],$producto['Dimensiones'],$producto['Descripcion']);
        $contador++;
    }
    return $product;
}
//pasamos a una variable el objeto


//Creamos el objeto de los detalles
function obDetalle(){
    global $detallesproducto;
    $contador = 0;
    $detalles[] = "";

    foreach ($detallesproducto as $detail){
        $detalles[$contador] = new detalles($detail['CodigoProducto'], $detail['Nombre'], $detail['Cantidad']);
    $contador++;
    }
    return $detalles;
}
$conn->close();
$obProducto = obProducto();
$obDetalles = obDetalle();

?>
<html lang="es">

<head>
    <title>RMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        .vue-star-rating-star[data-v-ef4bc576] {
            overflow: visible !important
        }

        .vue-star-rating-star-rotate[data-v-ef4bc576] {
            transition: all .25s
        }

        .vue-star-rating-star-rotate[data-v-ef4bc576]:hover {
            transition: transform .25s;
            transform: rotate(-15deg) scale(1.3)
        }
    </style>
    <style type="text/css">
        .vue-star-rating-star[data-v-fde73a0c] {
            display: inline-block
        }

        .vue-star-rating-pointer[data-v-fde73a0c] {
            cursor: pointer
        }

        .vue-star-rating[data-v-fde73a0c] {
            display: flex;
            align-items: center
        }

        .vue-star-rating-inline[data-v-fde73a0c] {
            display: inline-flex
        }

        .vue-star-rating-rating-text[data-v-fde73a0c] {
            margin-left: 7px
        }

        .vue-star-rating-rtl[data-v-fde73a0c] {
            direction: rtl
        }

        .vue-star-rating-rtl .vue-star-rating-rating-text[data-v-fde73a0c] {
            margin-right: 10px;
            direction: rtl
        }

        .sr-only[data-v-fde73a0c] {
            position: absolute;
            left: -10000px;
            top: auto;
            width: 1px;
            height: 1px;
            overflow: hidden
        }
        .aaa{
            width: 100px;
            height: 100px;
        }
        .back{
            border: 1px solid black;
        }
    </style>
    <style>
        [_nghost-din-c60] {
            font-family: Open Sans, sans-serif;
            color: #121212
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
    </div>
</nav>
<h1>Inmoviliarias Nobita</h1>
<?php
global $obProducto;

for ($i = 0; $i < count($obProducto);$i++) {
    echo '<div class="back">';
    echo '<div class="aaa">';
    echo '<a href="envio.php?id='.$obProducto[$i]->getCodigoProducto().'"><img class="card-img-top" src="https://images.emojiterra.com/google/android-11/128px/1f3e0.png"></a>';
    echo '</div>';

    echo '<p>' .$obProducto[$i]->getNombre(). '</p>';
    echo '<p>'.$obProducto[$i]->getGama(). '</p>';
    echo '<p>'.$obProducto[$i]->getDimensiones(). '</p>';
    echo '<p>'.$obProducto[$i]->getDescripcion(). '</p>';

    echo '</div>';


}



?>
</body>
<app-content ng-version="11.1.0"></app-content>

</html>