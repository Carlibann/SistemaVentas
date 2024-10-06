<?php

include_once ("../settings/connet.php");
$conexion =new connet();
$conn=$conexion->conectarDB();

$nuevoStado = 1;
$sql = $conn->prepare("UPDATE usuarios SET stado = ?");
$sql -> bind_param('i',$nuevoStado);
$sql ->execute();

session_start();
session_unset();
session_destroy();

header("location:./login.php");