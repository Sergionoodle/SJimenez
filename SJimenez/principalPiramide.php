<!DOCTYPE html>
<html lang="es">
<head>
    <title>Piramide</title>
</head>
<body>
<form action="/piramide.php" method="POST">
    <table>
        <tr>
            <td>
                <center><h2>PIRAMIDE</h2></center>
            </td>
        </tr>
        <tr>
            <td>Digito numerico</td>
            <td>
                <input type="number" name="numero" required>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Obtener">
            </td>
            <td>
                <input type="reset" name="resetear">
            </td>
        </tr>
    </table>
</form>
</body>
</html>