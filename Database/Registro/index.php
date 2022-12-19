<?php
  include_once('../config/config.php');
  include('Registro.php');

   $p = new Registro();
   $data = $p->getAll();

   if ( isset($_GET['ID']) && !empty($_GET['ID'])){
    $remove = $p->delete($_GET['ID']);
    if ($remove) {
        header('Location: '.ROOT.'/Registro/index.php');
    }else{
        $mensaje = '<div class="alert alert-danger" role="alert" > Error al eliminar </div>';
        }
   }    




 ?>

<!DOCTYPE html>
 <html>
   <head>
    <meta charset="UTF-8" />
    <title> Programacion de sesiones </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    </head>
 <body>
 <?php include ('../menu.php') ?>
  <div class="container">
    <h2 class="text-center mb-2" > Calendario </h2>
    <div class="row" >
        <?php
            while( $pt = mysqli_fetch_object ($data) ){
                $date = $pt->Fechacita;
                echo "<div class= 'col' >";
                    echo " <div> ";
                        echo "<h5> <img src='".ROOT."/images/$pt->Foto' width='50' height='75' /> $pt->Nombre $pt->Apellido </h5>";
                        echo "<p> <b>Fecha:</b> ". date('D', strtotime($date) ) . " ". date('d-M-Y H:i', strtotime($date) ) ."</p>";   
                        echo " <div class ='text-center'> ";
                            echo "<a class='btn btn-success' href='".ROOT."/Registro/edit.php?ID=$pt->ID' > Modificar </a> - <a class='btn btn-danger' href='".ROOT."/Registro/index.php?ID=$pt->ID' > Eliminar </a>"; 
                        echo "</div> ";
                    echo "</div> ";
                echo " </div> ";

            }
?>


