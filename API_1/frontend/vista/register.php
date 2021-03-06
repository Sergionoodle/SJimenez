<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #302667;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>

<form action="../controlador/controlador_register.php" method="post" name="register">
    <div class="container">
        <h1>Registrate</h1>
        <p>Introduce tus datos</p>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="nombre"><b>Nombre de usuario</b></label>
        <input type="text" placeholder="Usuario" name="user" id="user" required>

        <label for="contrasenya"><b>Contrase??a</b></label>
        <input type="password" name="passwd" id="passwd" required>

        <hr>
        <p>Vuelve a la pagina <a href="../controlador/controlador_lista.php">Buqin</a>.</p>

        <button type="submit" class="registerbtn" name="registrar">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="../controlador/controlador_login.php">Login</a>.</p>
    </div>
</form>

</body>
</html>
