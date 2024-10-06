<?php
    class connet
    {
       public $server = "localhost";
       public $name="root";
       public $pass="";
       public $db="company";

        public function conectarDB(){
            $conn = mysqli_connect($this->server,$this->name,$this->pass,$this->db);

            if (!$conn) {
                echo ("Error al conextar con la db");
            }
            return $conn;
        }
    
    }
    