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
<h1>Login</h1>
<a href="../controlador/register.php">register</a>
<form method="post">

    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name_log" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password_log" required>
    <button type="submit">Login</button>

</form>

<a href="../controlador/controlador_lista.php">Vuelve</a>
<br>
<a href="../controlador/close.php">Cerrar</a>

</body>
</html>