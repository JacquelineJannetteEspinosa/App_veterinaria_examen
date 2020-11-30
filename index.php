<?php require './indexX.php';?>
<?php require './Url_dominio.php'   ?>
<?php 
if($_GET){
        
  $eliminar = Citas::eliminarCita($_GET['eliminar']);
  header("Location:index.php");
            } 
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="<?=$URL?>citas.css">

 

    <!---google fonts---->
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Dancing+Script:wght@700&family=Pacifico&family=Yellowtail&display=swap" rel="stylesheet">


    <title>Veterinaria</title>
  </head>
  <body>
    <?php $algunos = new Citas(); $algunos->actualizarCita();  ?>
    <!-- Image and text -->
<nav class="navbar  navbar-expand-md navbar-dark" style="background: #c02739;">
   
    <a class="navbar-brand" href="<?=$URL?>index.php">
             <img src="<?=$URL?>imagenes/logo.jpg" width="60" height="50" class="d-inline-block align-top rounded" alt="" loading="lazy">
             <span class="titlelogo">Veterinaria</span>
    </a>
    

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?=$URL?>index.php">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
  </nav>
<!----------------- Termina barra de navegacion ------------>

<!------------------ inician contenido ----------->

<div class=" contenidog">
    <div class="container-fluid " style="background: #84142d;">
        <h2 class="text-center text-white pt-2 docsh ">REGISTRAR CITAS</h2>
        <h5 class=" text-center text-white"  ><small>Exámen desarrollado de forma monolítica PHP 7.4, MYSQL, HTML-5, CSS 3 Y Bootstrap 4.5</small></h5>

        

<!------------------ inician contenido caja1 (izquierda) ----------->
        <div class= "row">
            <div class="col-md-6 rojo d-flex align-items-center justify-content-end border">
                <div class="col-md-10   mt-4 mb-4 pt-2 pb-3">
                  <h6 class="text-white"><?php echo"MODIFUCAR LA VARIABLE DEL DOMINIO, ESTA ES LA URL DEL DOMINIO EN ESTE MOMENTO:  ".$URL ?></h6>
                        <form  id="submit"  method="POST" action="<?=$URL?>index.php" > <!---onsubmit="return false;    --- canccela el envio de formulario para no enviar a otra pagina--->
                            <!-- <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nom"> -->
                            <input type="hidden" name="nombre" value="1">
                            <label for="nombreMascota">Nombre Mascota</label>
                            <input type="text" name="nombreMascota" id="mascotanombre">
                            <label for="edad">Edad</label>
                            <input type="text" name="edad" id="edad">
                            <label for="tipoAnimal">Animal</label>
                            <input type="text" name="tipoAnimal" id="tipoAnimal">
                            <label for="raza">Raza</label>
                            <input type="text" name="raza" id="raza">
                            <label for="Sexo">Sexo</label>
                            <input type="text" name="Sexo" id="Sexo">
                            <label for="dia">Cita</label>
                            <input type="date" name="dia" id="diames">
                            <label for="hora">hora</label>
                            <input type="datetime" name="hora" id="hora">
                            <label for="padecimiento">Padecimiento</label>
                            <input type="text" name="padecimiento" id="padecimiento">
                            
                            <label for="DoctorAsignado">Numero de Doctor Asignado</label>
                            <input type="text" name="DoctorAsignado" id="DoctorAsignado">
                            
                            <input type="submit" value="Registrar cita" class="mt-5 btn btn-primary" id="summit">
                        </form>   
                    </div>       
                </div>    
         <!------------------ termina contenido caja1 (izquierda) ----------->
         
         <!------------------ inician contenido caja2 (derecha) ----------->
              
                <div class="col-md-6  d-flex justify-content-center border p-2 algo1 ">
                    <div class="row container-fluid m-0 p-0 ">

                        <div class="col-md-12 bg bg-white text-start pt-3  ">
                            
                            <?php
                            for ($i=0; $i<count($mostrarCitas); $i++):?>
                            <div class=" col-md-12  ">
                              <div class=" p-3 tarjeta">
                              <h6>Nombre de la mascota: <strong><?=$mostrarCitas[$i]['nombre_mascota']?></strong></h6>
                              <h6>Edad de la mascota: <?=$mostrarCitas[$i]['edad']?></h6>
                              <h6>Tipo de mascota: <?=$mostrarCitas[$i]['tipo_mascota']?></h6>
                              <h6>Raza: <?=$mostrarCitas[$i]['raza']?></h6>
                              <h6>Sexo de la mascota: <?=$mostrarCitas[$i]['sexo_mascota']?></h6>
                              <h6>Problematica: <?=$mostrarCitas[$i]['problematica']?></h6>
                              <h6>Fecha programada para: <?=$mostrarCitas[$i]['fecha_cita']?></h6>
                              <h6>Hora: <?=$mostrarCitas[$i]['hora_cita']?></h6>

                              <a href="<?=$URL?>index.php?eliminar=<?= $mostrarCitas[$i]['id']; ?>" type="button" class="btn btn-danger">Eliminar</a>
                              <a href="<?=$URL?>paginas/editar.php?pagina=editar&id=<?=$mostrarCitas[$i]['id']?>"  type="button" class="btn btn-danger">Editar</a>

                            </div> <hr>
                                </div>
                            <?php endfor; ?>
                        </div>

                    </div>


                </div>        

            </div>
    
    </div>   
</div>


 <!------------------ termina contenido caja2 (Derecha) ----------->

 
 <!------------------ inicia lista doctores ----------->

 <section class="docs ">
<h2 class="text-center docsh ">Doctores para Agendar cita</h2>
<h5 class=" text-center text-white"  ><small>Seccion desarrollada de forma monolitica PHP 7.4, MYSQL Y Bootstrap 4.5</small></h5>
<div class="Docs d-flex justify-content-around flex-wrap"  >

  <?php for($i = 0; $i<count($docs); $i++):  ?>

            <!--inicia card-->
    <div class="card m-3 " style="max-width: 540px; min-width:260px">
     <div class="row no-gutters">
      <div class="col-md-4  ">
      <img src="https://i.pinimg.com/736x/39/97/b8/3997b837ba0548ec1a5430ee31fb43aa.jpg" class="card-img" alt="...">
      </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?=$docs[$i]["nombre"] ?></h5>
        <p class="card-text">Especialidad: <?= $docs[$i]["especialidad"]?></p>
        <p class="card-text">Años de experiencia: <span class="text-danger"> <?=$docs[$i]['tiempo_experiencia'] ?></span></p>
        <p class="card-text">Si te gusto este doctor su Numero de asignacion es: <span class="text-danger font-weight-bold"> <?=$docs[$i]["doctor_asignado_id"]?></span> </p>
      </div>
    </div>
  </div>
</div>
                <!---termina card-->
<?php endfor; ?>
</div>
</section>
 <!------------------ termina lista doctores ----------->


 <!------------------ imagen perros ----------->

 <section>
   <h2 class="text-center text-info font-weight-bold py-5 " style="font-family: 'Amatic SC', cursive !important; font-size:38px;">
  
   <span class="span">NO</span><span class="span">&nbsp;
  </span><span class="span">TE</span><span class="span">&nbsp;
  </span><span class="span">PREOCUPES,</span><span class="span">&nbsp;
  </span><span class="span">ESTAN</span><span class="span">&nbsp; 
  </span><span class="span">EN</span><span class="span">&nbsp;   
  </span><span class="span">BUENAS</span><span class="span">&nbsp; 
  </span><span class="span">MANOS</span> 

  
  
  </h2>
  <div class="p2">
    <img class="imp2" src="./imagenes/Mascotas.png" alt="">
  </div>
 </section>
<!-- termina imagen perros -->

 <!------------------ inicia clientes satisfechos ----------->


<section class="clientes">
<h2 class="letrasClientes text-center docsh">Clientes Satisfechos</h2>
<p class="text-center pb-4 text-white" >Seccion desarrollada utilizando fetch moderno hacia un servicio rest</p>
<div class="container-fluid">
  <div class="row">
  <div class="col-md-12 ClientesSatisfechos  d-flex flex-wrap justify-content-between">
  


  </div>
  </div>
</div>
</section>
 <!------------------ termina clientes satisfechos ----------->



<footer >
  <p>&copy; <span class="lettersfoo"></span> <span class="f1"></span> </p> 
</footer>



  





    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- <script src="peticiones.js"></script> -->
    <script src="<?=$URL?>paginas/js.js"></script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->



  </body>
</html>