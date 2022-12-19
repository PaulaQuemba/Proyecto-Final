<?php

class Database{
    public $host = '127.0.0.1'; // Servidor
    public $user = 'root'; // Usuario de phpMyadmin
    public $pass = ''; // Contraseña de phpMyadmin
    public $db = 'database'; // base de datos
    public $conexion;

    function connectToDatabase(){
        $this->conexion = mysqli_connect( $this->host, $this->user, $this->pass, $this->db);

        if ( mysqli_connect_error() ){
            echo ' Error de conexion ' . mysqli_connect_error();
        } 

        return $this->conexion;
    }
}

?>