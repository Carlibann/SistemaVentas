<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <form action="./valid_user.php" method="post">
        <div>
            <?php
                if (isset($_GET["error"])) {
                    $error = $_GET["error"];
                    echo("<h2>$error</h2>");
                }
            ?>
        </div>
        <div>
            <label for="">Correo</label>
            <input type="email" name="correo" id="" placeholder = "Correo">
        </div>
        
        <div>
            <label for="">Clave</label>
            <input type="password" name="clave" id="" placeholder = "Contraseña">
        </div>
        <button type="submit" name="datos">Ingresar</button>
    </form>
</body>
</html>