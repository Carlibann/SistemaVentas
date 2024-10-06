<?php
    
        

    class Clientes
    {
        

        public $nombre;
        public $apellido;
        public $clave;
        public $correo;
        private $stado = 2;
        private $rol = 3;

        

        public function crearUsuario(){
            include_once ("../settings/connet.php");
            $conexion =new connet();
            $conn=$conexion->conectarDB();

            //CREAR LA CONSULTA PREPARADA
            $sql = $conn->prepare("INSERT INTO usuarios (nombre,apellido,stado,clave,correo,id_roles) VALUES (?,?,?,?,?,?)");
            $sql->bind_param("ssissi", $this->nombre, $this->apellido, $this->stado, $this->clave, $this->correo, $this->rol);
            //verifica la consulta correcta
            if ($sql->execute()) {
                session_start();
                echo("Datos ingresados correctamente");
                header("location:../public/dashboard.php?us=".urlencode($this->correo));
            }else {
                $error = "Ocurrio un error al ingresar los datos";
                header("location:./index.php?error=${error}");
            }
            $sql->close();
        }

        public function usuariosOnline(){
            include_once ("../settings/connet.php");
            $conexion =new connet();
            $conn=$conexion->conectarDB();

             //CREAR LA CONSULTA PREPARADA
             $sql = $conn->prepare("SELECT usuarios.nombre,usuarios.stado FROM usuarios WHERE stado = 2");
             $sql ->execute();
             $result = $sql->get_result();
             //verifica la consulta correcta
             if ($result->num_rows > 0) {
                 while ($filas = $result->fetch_assoc()) {
                    $usuariosOnline = $filas["stado"];
                    if ($usuariosOnline == 2) {
                        $estadoUsuario = "Online";
                    }else{
                        $estadoUsuario = "Offline";
                    }
                    echo    "Nombre: ".$filas['nombre']." Estado: ".$estadoUsuario."<br>";
                 }
             }else {
                 echo "No hay usuarios online";
                 
             }
             $sql->close();
            
        }

        public function validarUsuario(){
            include_once ("../settings/connet.php");
            $conexion =new connet();
            $conn=$conexion->conectarDB();

             //CREAR LA CONSULTA PREPARADA
             $sql = $conn->prepare("SELECT usuarios.id_usuario,usuarios.correo,usuarios.clave FROM usuarios WHERE correo = ? AND clave = ?");
             $sql->bind_param("ss",$this->correo,$this->clave);
             $sql ->execute();
             $result = $sql->get_result();
             //verifica la consulta correcta
             if ($result->num_rows > 0) {
                $dato=$result->fetch_assoc();
                $id=$dato["id_usuario"];
                $nuevoStado = 2;
                //actuallizo el estado a online
                $sql = $conn->prepare("UPDATE usuarios SET stado = ? WHERE id_usuario = ?");
                $sql->bind_param("ii",$nuevoStado,$id);
                $sql ->execute();
                header("location:../public/dashboard.php?us=".urlencode($this->correo));
             }else {
                $error = "El usuario que ingresi no existe";
                header("location:./login.php?error=${error}");
                 
             }
             $sql->close();
            
        }

        

       
        
        


    }