<?php
include_once("./usuario.php");
    if (isset($_POST["datos"])) {
        if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["correo"]) && !empty($_POST["clave"])) {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $correo = $_POST["correo"];
            $clave = $_POST["clave"];

            $cliente = new Clientes;
            $dato = $cliente->nombre=$nombre; 
            $dato = $cliente->apellido=$apellido; 
            $dato = $cliente->correo=$correo; 
            $dato = $cliente->clave=$clave;
            $dato =$cliente->crearUsuario(); 
        }else {
            $error = "Los campos no pueden estar vacios..";
            header("location:../index.php?error=$error");
        }
    }else {
        $error = "Ocurrio un error al registrar el usuario...";
        header("location:../index.php?error=$error");
    }