<?php
include_once("./usuario.php");
    if (isset($_POST["datos"])) {
        if (!empty($_POST["correo"]) && !empty($_POST["clave"])) {
            $correo = $_POST["correo"];
            $clave = $_POST["clave"];

            $cliente = new Clientes;
            $dato = $cliente->correo=$correo; 
            $dato = $cliente->clave=$clave;
            $dato =$cliente->validarUsuario(); 
        }else {
            $error = "Los campos no pueden estar vacios..";
            header("location:../index.php?error=$error");
        }
    }else {
        $error = "Ocurrio un error al registrar el usuario...";
        header("location:../index.php?error=$error");
    }