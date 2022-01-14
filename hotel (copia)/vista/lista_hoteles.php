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
            background: linear-gradient(to bottom, #686868, #acacac);
        }

        .head {
            background: linear-gradient(to bottom, #9c9c9c, #474747);
            margin-bottom: 10px;
            border: solid black 1px;
        }

        #property-135472387 {
            margin: 20px;
        }
    </style>
</head>

<body>
<section class="head">
    <div class="container">
        <h2 class="text-center"><span>Buquin Hoteles Mallorca</span></h2>
    </div>
</section>
<div class="clearfix"></div>
<?php //Hacemos el foreach de hoteles, para rellenar los datos
//Recuerda desplegarlo en el controlador que es lo que tiene todo
foreach ($hoteles as $hotel){?>
<div id="property-135472387" class="media" style="background-color: rgba(255, 255, 255, 0.692) ">
    <img class="d-flex align-self-start" src="../<?php echo $hotel->getIdDatos()->getImagen(); ?>" alt="Generic placeholder image">
    <div class="media-body pl-3">
        <div class="price">
            <!-- RECUERDA : toda vista va a un controlador -->
            <!-- OJO a esto, lo llevas a la pagina extendida [--?--]id=Y AQUI EL ID QUE PASAREMOS  -->
            <a href="../controlador/controlador_pagina_datos.php?id=<?php echo $hotel->getId() ?>"><?php echo $hotel->getNombreHotel();?></a>
            <small><?php echo $hotel->getUbicacion(); ?>.</small>
        </div>
        <div class="stats">
            <span><?php echo $hotel->getPuntuacion();?> <i class="fa fa-star" style="color: yellow" ></i></span>
            <span><?php echo $hotel->getPrecio();?> €</i></span>
        </div>
    </div>
</div>
<?php }?>
</body>