<?php require '../indexX.php';?>
<?php require '../Url_dominio.php'   ?>

<?php $mostrarCitaUnica = Citas::imprimirCita( $_GET['id']);   ?>

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



    <title>Editar</title>
  </head>
  <body>
    
    <!-- Image and text -->
<nav class="navbar  navbar-expand-md navbar-dark" style="background: #c02739;">
   
    <a class="navbar-brand" href="<?=$URL?>index.php">
             <img src="<?=$URL?>imagenes/logo.jpg" width="60" height="50" class="d-inline-block align-top rounded" alt="" loading="lazy">
             <h1 class="titlelogo d-inline-block">Veterinaria</h1>   
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

<div class="contenedor">
    <div class="container-fluid" style="background: #84142d;">
        <h2 class="text-center  pt-2 docsh ">REGISTRAR CITAS</h2>

<!------------------ inician contenido caja1 (izquierda) ----------->
        <div class= "row d-flex justify-content-center pb-4 ">
            <div class="col-md-6 rojo d-flex align-items-center justify-content-end border pb-4">
                <div class="col-md-10   mt-4 mb-4 pt-2 mb-3 pb-3">
                        <form  id="submit"  method="POST" action="<?=$URL?>index.php"> <!---onsubmit="return false;    --- canccela el envio de formulario para no enviar a otra pagina--->
                            <!-- <label for="actualizarnombre">Nombre</label>
                            <input type="text" name="actualizarnombre" id="nom"> -->
                            <input type="hidden" name="actualizarnombre" value="1">
                            <label for="nombreMascota">Nombre Mascota</label>
                            <input type="text" name="actualizarnombreMascota" id="mascotanombre">
                            <label for="edad">Edad</label>
                            <input type="text" name="actualizaredad" id="edad">
                            <label for="tipoAnimal">Animal</label>
                            <input type="text" name="actualizartipoAnimal" id="tipoAnimal">
                            <label for="raza">Raza</label>
                            <input type="text" name="actualizarraza" id="raza">
                            <label for="Sexo">Sexo</label>
                            <input type="text" name="actualizarSexo" id="Sexo">
                            <label for="dia">Cita</label>
                            <input type="date" name="actualizardia" id="diames">
                            <label for="hora">hora</label>
                            <input type="datetime" name="actualizarhora" id="hora">
                            <label for="padecimiento">Padecimiento</label>
                            <input type="text" name="actualizarpadecimiento" id="padecimiento">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            
                            <label for="DoctorAsignado">Numero de Doctor Asignado</label>
                            <input type="text" name="actualizarDoctorAsignado" id="DoctorAsignado">
                            <input type="submit" value="Actualizar cita" class="mt-5 btn btn-primary" id="summit">
                        </form>   
                    </div>       
                </div>    
            
         <!------------------ termina contenido caja1 (izquierda) ----------->
         
</div>  
</div>
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
    <img class="imp2" src="<?=$URL?>imagenes/Mascotas.png" alt="">
  </div>
 </section>
<!-- termina imagen perros -->




 <footer >
  <p>&copy; <span class="lettersfoo"></span> <span class="f1"></span> </p> 
</footer>


<!-- <script src="peticiones.js"></script> -->
<script src="<?=$URL?>paginas/js.js"></script>
  </body>
</html>