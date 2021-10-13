<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Como de segura es mi contraseña?</title>
    <style>
        body{
            background-color: green;
        }
        div{
            justify-content: center;
        }
    </style>
</head>
<body id="body">
<form action="constrasenaSegura.php" method="post">
    <p>Introduce tu contraseña: <input type="text" name="pass"></p>
    <p>
        <input type="submit" value="Enviardatos">
    </p>
<?php
    if(isset($_POST["pass"])){

    }
?>
</form>

</body>
</html>