<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://dawsonferrer.com/allabres/ddbb/mallorcasa/styles/main.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Mallorcasa</title>
    <style>
        body {
            background: linear-gradient(to bottom, #ffffff, #656565);
        }

        .head {
            border: solid #000000 1px;
            background: linear-gradient(to top, #0033a5, #5c3cd9);
            margin-bottom: 10px;
        }

        #property-135472387 {
            margin: 20px 20px 35px 20px;

        }
        .orden{
            position: absolute;
            margin: 10px;
        }
        .logyreg{
            position: absolute;
            margin: 10px;
            top: 25px;
            left: 83%;
        }
        b{
            -webkit-text-stroke: 0.5px black;
        }

        span{
            -webkit-text-stroke: 0.5px white;
        }
        #botonOrden{
            margin-left: 13px;
            margin-top: 5px;
        }
        #orden{
            margin-top: 25%;
            margin-left: 10%;
        }
        .book{
            margin-top: 5px;
        }


    </style>
</head>

<body>
<div class="orden">
    <form action="../controlador/control_lista.php">
        <select name="ordenar" id="orden">
            <option value="unsorted">Sin orden</option>
            <option value="nombre">Por Nombre</option>
            <option value="precio">Por Precio</option>
        </select>
        <br>
        <button id="botonOrden" class="btn" type="submit">Ordenar</button>
    </form>
</div>

<section class="head">
    <div class="container">
        <h2 class="text-center"><span style="color: black; ">Buquin Hoteles Mallorca
                <?php if($_SESSION['login']){ ?>
                    <br>
                <span>Welcome: <?php  echo $_SESSION['usuario'] ?></span>
                <?php } ?>
        </h2>
    </div>
</section>

<div class="logyreg">
    <a href="../controlador/controlador_register.php"><button type="button" class="btn btn-info">ENTRA YA!</button></a>
    <br>
    <a href="../controlador/controlador_cerrar_session.php"><button type="button" class="btn btn-info mt-1">Cerrar Sesion</button></a>
</div>

<div class="clearfix"></div>
<?php foreach ($hoteles_api as $hotel){?>
    <div id="property-135472387" class="media" style="background-color: white; border: 1px solid black; ">
        <img class="d-flex align-self-start" src="../<?php echo $hotel->id_datos->imagen ?>" alt="Generic placeholder image">
        <div class="media-body pl-3">
            <div class="price">
                <!-- RECUERDA : toda vista va a un controlador -->
                <!-- OJO a esto, lo llevas a la pagina extendida [--?--]id=Y AQUI EL ID QUE PASAREMOS  -->
                <a href="../controlador/controlador_pagina_datos.php?id=<?php echo $hotel->id ?>"><?php echo $hotel->nombre_hotel ?></a>
                <small><?php echo $hotel->ubicacion; ?>.</small>
            </div>
            <div class="stats" style="margin-top: 0px">
                <span><?php echo $hotel->puntuacion;?> <i class="fa fa-star" style="color: yellow" ></i></span>
                <span><?php echo $hotel->precio;?> €</i></span>
            </div>

        </div>
    </div>
<?php  }?>
</body>