<?php
//incluimos todas las clases
include_once "principal.php";
include_once "staff.php";
include_once "sql.php";
include_once "multimedia.php";

//creamos la conexion de la base de datos
$dbo = new sql();
$principales = $dbo->getprincipal();



?>

<head>
    <title>SUPERIMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .col-md-4{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            margin-top: 15px;
            background:linear-gradient(211deg, rgba(131,58,180,1) 42%, rgba(29,92,253,1) 78%);

        }

        .card-body{
            background-color: rgba(18, 47, 234, 0.18);
        }
        .mb-4{
            width: 300px;
            height: auto;
            margin: 3px;

        }
        .estrella{
            width: 25px;
            height: 25px;
        }

        .card-img-top{
            width: 100%;
            height: 300px;
        }
        .cabecera{
            background-color: rgba(40, 10, 75, 0.96);
            height: 50px;
        }
        .h1{
            color: white;
            text-align: center;
        }


    </style>
</head>

<body>

<div class="cabecera">
    <h1 class="h1">Ifinity Movies Dont Be Moved</h1>
</div>


        <div class="col-md-4 ">
            <?php foreach ($principales as $principal){ ?>

            <div class="card mb-4 box-shadow bg-light">

                <a href="paginaextendida.php?id=<?php echo $principal->getIdMultimedia()->getId(); ?>"><img class="card-img-top" src="<?php echo $principal->getIdMultimedia()->getUrl()?>" alt="imagen"></a>
                <div
                    class="card-body">
                    <h5 class="card-title"><?php echo $principal->getTitulo()?></h5>
                    <hr style="height: 5px">
                        <div class="mb-3" style="margin-bottom:0!important;"><label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Genero:</strong></label>
                            <div id="emailHelp" class="form-text" style="margin-top:0;"><?php echo $principal->getGenero()?></div>
                        </div>
                        <div class="mb-3"><label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Puntuacion:</strong></label><div id="emailHelp" class="form-text" style="margin-top:0"></div>
                            <div id="emailHelp" class="form-text" style="margin-top:0;"><?php echo $principal->getPuntuacion()?><img class="estrella" src="img/pngegg.png"></div>
                        </div>
                        <div class="descripcion"><strong>Descripcion</strong>
                        <div id="descripcionentera" class="form-text" style="margin-top:0;"><?php echo $principal->getDescripcion()?></div>
                        </div>
                </div>

            </div>

            <?php } ?>

        </div>






</body>