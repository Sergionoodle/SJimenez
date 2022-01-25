
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA</title>
    <style>
        table,tr,td,th{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<h1>Objetos Tienda Raton Ratoncin</h1>
<p>Hola <?php if($_SESSION['log']){
    echo $_SESSION['nom'];
    }
    ?></p>
<a href="../controlador/controlador_lista.php">Vuelve</a>
<a href="../controlador/login.php">log</a>
<table>
    <tr>
        <th>id</th>
        <th>Nombre Objeto</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Puntuacion</th>
    </tr>
    <tr>
        <td><?php echo $objetin->getId(); ?></td>
        <td><?php echo $objetin->getNombre(); ?></td>
        <td><?php echo $objetin->getIdInformacion()->getDescripcion(); ?></td>
        <td><?php echo $objetin->getIdInformacion()->getPrecio(); ?></td>
        <?php if($_SESSION['log']){ ?>
            <form method="post">
                <label for="uname"><b>Compra</b></label>
                <input type="number" placeholder="Compra y baja el precio" name="compra" required>
                <button type="submit">Register</button>
            </form>
        <?php }?>
        <td><?php echo $objetin->getIdInformacion()->getPuntuacion(); ?></td>
    </tr>
</table>
<a href="../controlador/close.php">Cerrar</a>
</body>
</html>