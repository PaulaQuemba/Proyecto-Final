<?php
    include_once('../config/config.php');
    include('../config/Database.php');


    class Registro{

        public $conexion;


        function __construct()
        {
            $db =new Database ();
            $this->conexion = $db->connectToDatabase();
        }

        function save ($params){
            $Nombre = $params['nombre'];
            $Apellido = $params['apellido'];
            $Celular = $params['celular'];
            $Correoelectronico = $params['correoelectronico'];
            $Condiciones = $params['condiciones'];
            $Fechacita = $params['fechacita'];
            $Foto = $params['Foto'];

            /* echo $Nombre; 

            echo $Apellido; 

            echo $Celular;
            echo $Correoelectronico;
            echo $Condiciones;
            echo $Fechacita;
            echo $Foto; */

            $insert = " INSERT INTO registro VALUES (NULL, '$Nombre', '$Apellido', '$Celular', '$Correoelectronico', '$Condiciones','$Fechacita','$Foto') ";
            
            return mysqli_query($this->conexion, $insert);
        }

        function getAll(){
            $sql = "SELECT * FROM registro ORDER BY fechacita ASC";
            return mysqli_query($this->conexion, $sql);
        }

        function getOne($ID) 
        {
            $sql = "SELECT * FROM registro WHERE ID = $ID";
            return mysqli_query($this->conexion, $sql);
        }
        
        function update ($params){
            $Nombre = $params['nombre'];
            $Apellido = $params['apellido'];
            $Celular = $params['celular'];
            $Correoelectronico = $params['correoelectronico'];
            $Condiciones = $params['condiciones'];
            $Fechacita = $params['fechacita'];
            $Foto = $params['Foto'];
            $ID = $params['ID'];

            $update = " UPDATE registro SET nombre= '$Nombre', apellido='$Apellido', celular=$Celular, correoelectronico='$Correoelectronico', condiciones='$Condiciones', fechacita='$Fechacita', Foto='$Foto' WHERE ID = $ID";
            return mysqli_query($this->conexion, $update);

        }

        function delete($ID){
            $delete="DELETE FROM registro WHERE ID = $ID ";
            return mysqli_query($this->conexion, $delete);
        }
    }
?>
