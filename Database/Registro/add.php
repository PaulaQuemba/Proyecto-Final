<?php
include_once('../config/config.php');
include('Registro.php');

if ( isset($_POST) && !empty($_POST) ){
    $p = new Registro();

    if ($_FILES['Foto']['name'] !==''){
        $_POST['Foto'] = saveImage($_FILES);

    }

    $save = $p->save($_POST);
    if ($save){
       $mensaje = '<div class="alert alert-success" > sesión registrada </div>';
    }else{
        $mensaje = '<div class="alert alert-danger" > error al registrar! </div>';
}
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Registro de pacientes </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="css/.mq.css">
    
  
    </head>
    <body>
    
        <nav>
            <a href="../index.html"> <img src="../imagenes/logo.png" class="img-logo" alt=""> </a>
            <ul>
                <li> <a href="../index.html"> Home </a></li>
                <li> <a href="../costos.html"> Costos </a></li>
                <li> <a href="../Registro/add.php"> Contacto </a></li>
                <li> <a href="../#servicios">Servicios </a> </li>
            </ul>
        </nav>
    
        <div class="container">
            <?php
            if(isset($mensaje)){
                echo $mensaje;
            }
            ?>
            <h2 class="text-center mb-2"> Registro de pacientes </h2>
            <form method="POST" enctype="multipart/form-data">


                <div class="row mb-2">
                    <div class="col">
                        <input type= "text" name="nombre" id="nombre" placeholder= "Nombre del paciente" class="form-control"/> 
                    </div>
                    <div class="col">
                        <input type= "text" name="apellido" id="apellido" placeholder= "Apellido del paciente" class="form-control"/>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <input type= "number" name="celular" id="celular" placeholder= "Celular del paciente" class="form-control"/> 
                    </div>
                    <div class="col">
                        <input type= "email" name="correoelectronico" id="correoelectronico" placeholder= "Correo del paciente" class="form-control"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <textarea id="condiciones" name="condiciones" placeholder= "Condiciones del paciente" class="form-control"> </textarea> 
                    </div>
                    <div class="col">
                        <input type= "datetime-local" name="fechacita" id="fechacita" class="form-control" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type= "file" name="Foto" id="Foto" class="form-control"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <button class="btn btn-success"> Registrar </button>
                    </div>
                    
                </div>
                
            </form>

            <footer>
        <address>DERECHOS RESERVADOS PSILOGIACLINIC.COM</address>

        <div>
            <a href="#">Facebook</a>-
            <a href="#">Twitter</a>-
            <a href="#">Instagram</a>
        </div>

    </footer>
    </div>
    </body>
</html>
