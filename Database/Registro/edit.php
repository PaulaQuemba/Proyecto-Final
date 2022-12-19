<?php

include('../config/config.php');
include('Registro.php');

$p = new Registro();
$dp = mysqli_fetch_object($p->getOne($_GET['ID']));

$date = new DateTime($dp->Fechacita);

if (isset($_POST) && !empty($_POST)){
    $_POST['Foto'] = $dp->Foto;
    if ( $_FILES['Foto']['name'] !== ''){
       $_POST ['Foto'] = saveImage($_FILES);
    }
    $update = $p->update ($_POST);
    if ($update){
        $mensaje= '<div class="alert alert-success" role="alert" > Datos modificados con exito. </div>';
    }else{
        $mensaje= '<div class="alert alert-danger" role="alert" > Error! </div>"';
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Modificar pacientes </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <?php include ('../menu.php') ?>
        <div class="container">
            <?php
            if(isset($mensaje)){
                echo $mensaje;
            }
            ?>
            <h2 class="text-center mb-2"> Modificar Registro </h2>
            <form method="POST" enctype="multipart/form-data">


                <div class="row mb-2">
                    <div class="col">
                        <input type= "text" name="nombre" ID="nombre" placeholder= "Nombre del paciente" class="form-control" value="<?= $dp->Nombre ?>" /> 
                        <input type="hidden" name="ID" value="<?= $dp->ID ?>" />
                    </div>
                    <div class="col">
                        <input type= "text" name="apellido" ID="apellido" placeholder= "Apellido del paciente" class="form-control" value="<?= $dp->Apellido ?> "/>
                    </div>
                </div>

                <div class="row mb-2" >
                    <div class="col">
                        <input type= "number" name="celular" ID="celular" placeholder= "Celular del paciente" class="form-control" value="<?= $dp->Celular ?> "/> 
                    </div>
                    <div class="col">
                        <input type= "email" name="correoelectronico" ID="correoelectronico" placeholder= "Correo del paciente" class="form-control" value="<?= $dp->Correoelectronico ?> " />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <textarea ID="condiciones" name="condiciones" placeholder= "Condiciones del paciente" class="form-control"> <?= $dp->Condiciones ?> </textarea> 
                    </div>
                    <div class="col">
                        <input type= "datetime-local" name="fechacita" ID="fechacita" class="form-control" value="<?= $date->format('Y-m-d\TH:i') ?> "/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type= "file" name="Foto" ID="Foto" class="form-control"value="<?= $dp->Apellido ?> "/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <button class="btn btn-success"> Modificar </button>
                    </div>
                    <!--<div class="col">
                        <button class="btn btn-danger" href="../Database"> Volver </button>
                    </div>-->
                </div>
                
            </form>
        </div>
    </body>
</html>