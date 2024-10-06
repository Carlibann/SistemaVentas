<?php
    include ("./settings/connet.php");

    $Connexion = new connet();
    $conectar = $Connexion -> conectarDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>
    <form action="./view/aut_user.php" method="post">
        <div>
            <?php
                if (isset($_GET["error"])) {
                    $error = $_GET["error"];
                    echo("<h2>$error</h2>");
                }
            ?>
        </div>
        <div>
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="" placeholder = "nombre">
        </div>
        
        <div>
            <label for="">Apellido</label>
            <input type="text" name="apellido" id="" placeholder = "Apellido">
        </div>
        
        <div>
            <label for="">Correo</label>
            <input type="email" name="correo" id="" placeholder = "Correo">
        </div>
        
        <div>
            <label for="">Clave</label>
            <input type="password" name="clave" id="" placeholder = "Contraseña">
        </div>
        <button type="submit" name="datos">Registrar</button>
    </form>
</body>
</html>