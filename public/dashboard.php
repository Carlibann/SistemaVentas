<?php
 session_start();
 if (!isset($_GET["us"])) {
    $error = "ups ocurrio un error inicia nuevamente";
    header("location:../index.php?error=${error}");
 }else {

    include_once ("../settings/connet.php");
    $conexion =new connet();
    $conn=$conexion->conectarDB();

    $id_usuario = $_GET["us"];
    //CREAR LA CONSULTA PREPARADA
    $sql = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $sql->bind_param("s",$id_usuario);
    $sql -> execute();
    $result=$sql->get_result();

    if ($result->num_rows> 0) {
        $usuario= $result->fetch_assoc();
        $nombre = $usuario["nombre"];
        $apellido = $usuario["apellido"];
        $estado = $usuario["stado"];

        if ($estado == 2) {
            $estadoUsuario = "online";
        }else {
            $estadoUsuario = "offline";
        }
    }else {
        $error = "ups ocurrio un error inicia nuevamente";
        header("location:../index.php?error=${error}");
    }
    $sql->close();
    
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashborad</title>
</head>
<body>
    <h2><?php echo $nombre," ",$apellido;?></h2>
    <h4>estado:<?php echo $estadoUsuario ?></h4>

    <div>
        <h2>Estado de usuarios</h2>
        <?php
            include_once("../view/usuario.php");
            $usuariosEstado = new Clientes();
            $verStados=$usuariosEstado->usuariosOnline();
        ?>
    </div>
    <div>
        <a href="../view/cerrar_session.php">Cerrar Session</a>
    </div>
</body>
</html>