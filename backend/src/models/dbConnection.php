<?php
class Conexion{

        static public function conectar(){
            $conexion = mysqli_connect("localhost", "root", "", "utnfinal");
            return $conexion;
        }
    };
