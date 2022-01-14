<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://dawsonferrer.com/allabres/ddbb/mallorcasa/styles/main.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Mallorcasa</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=outline -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=round -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=sharp -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=twotone -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #686868, #acacac);
        }

        .head {
            background: linear-gradient(to bottom, #9c9c9c, #474747);
            margin-bottom: 10px;
            border: solid rgba(255, 255, 255, 0.692) 1px;
        }

        #property-135472387 {
            margin: 20px;
        }

        .presentacion {
            background-color: rgba(255, 255, 255, 0.541);
            border: 1px solid black;
            width: 70%;
            height: 700px;
            margin: auto;
        }

        iframe {
            width: 50%;
            height: 500px;
            margin: 10px;
        }

        .ubicacion {
            position: absolute;
            right: 30%;
            font-size: large;
            font-weight: bold;
        }

        .precio {
            position: absolute;
            right: 30%;
            font-size: large;
            font-weight: bold;
            top: 200px;
        }

        .puntuacion {
            position: absolute;
            right: 30%;
            font-size: large;
            font-weight: bold;
            top: 300px;
        }

        .volver {
            position: absolute;
            right: 30%;
            font-size: large;
            font-weight: bold;
            top: 400px;
        }

        .descripcion{
            margin: 10px;
        }
    </style>
</head>

<body>

<section class="head">
    <div class="container">
        <h2 class="text-center"><span><?php echo $hotel->getNombreHotel(); ?></span></h2>
    </div>
</section>
<div class="clearfix">

</div>

<div class="presentacion">

    <p class="ubicacion"><?php echo $hotel->getUbicacion(); ?>&nbsp;<i class="fa fa-map-pin" aria-hidden="true"></i></p>
    <p class="precio"><?php echo $hotel->getPrecio();?>€</p>
    <p class="puntuacion"><?php echo $hotel->getPuntuacion();?><i class="fa fa-star" style="color: yellow" ></i></p>
    <a class="volver" href="../controlador/controlador_lista.php"> VOLVER &nbsp;<span class="material-icons">home</span> </a>
    <?php echo $hotel->getIdDatos()->getVideo(); ?>
    <p class="descripcion"><?php echo $hotel->getIdDatos()->getDescripcion(); ?></p>


</div>

</body>
