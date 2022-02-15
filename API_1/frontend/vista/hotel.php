<p><b> Nombre hotel:</b> <?php echo $hotel->hotel->nombre_hotel ?></p>
<p><b>ID: </b><?php echo $hotel->hotel->id?></p>
<p><b>Ubicacion: </b><?php echo $hotel->hotel->ubicacion?></p>
<p><b>Precio: </b><?php echo $hotel->hotel->precio ?>€</p>
<p><b>Puntuacion: </b><?php echo $hotel->hotel->puntuacion ?>★</p>
<p><b>Descripcion: </b><?php echo $hotel->hotel->id_datos->descripcion ?></p>
<p><b>Video: </b><?php echo $hotel->hotel->id_datos->video?></p>
<a href="../controlador/control_lista.php">Volver</a>
<?php if($_SESSION['login']) {
echo "<p>Sigues aqui pajaro ".$_SESSION['usuario']." con el mail ".$_SESSION['email']."</p>";
}
    ?>
<form method="post">
    Precio:
    <input type="text" name="precio">
    <button type="submit">Enviar</button>
</form>
