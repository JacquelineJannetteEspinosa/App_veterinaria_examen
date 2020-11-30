<?php
class Conexion{

    //m d c
    static public function conectar(){
        $mbd = new PDO('mysql:host=localhost;dbname=veterinaria', 'root', '');
        $mbd->exec("set names utf8");
        return $mbd;
    }
}



class Doctor {
    //METODO ESTATICO DE LA CLASE
    // static public function Listar(){
    //     $conexion = Conexion::conectar()->prepare( "SELECT * FROM doctor"); //Declaramos consulta
    //     $conexion->execute(); //Ejecutamos la consulta 
    //     return $conexion->fetchAll(); 
    // }

    static public function Registrar(){
        $conexion = Conexion::conectar()->prepare( "SELECT * FROM doctor"); //Declaramos consulta
        $conexion->execute(); //Ejecutamos la consulta 
        return $conexion->fetchAll(); 


    }
}//termina clase doctor




class Propietario {
    static public function ListarProp(){
        $conexion1 = Conexion::conectar()->prepare("SELECT * FROM propietario");
        $conexion1->execute();
        return $conexion1->fetchAll();
    }
}//termina clase propietario

class Citas{

    static public function crearCita(){
        if(isset($_POST["nombre"])){
            $datos = array("propietario_id"=> $_POST["nombre"],
                            "nombre_mascota" => $_POST["nombreMascota"],
                            "edad" => $_POST["edad"],
                            "raza" => $_POST["raza"],
                            "tipo_mascota" => $_POST["tipoAnimal"],
                            "sexo_mascota" => $_POST["Sexo"],
                            "problematica" => $_POST["padecimiento"],
                            "hora_cita" => $_POST["hora"],
                            "fecha_cita" => $_POST["dia"],
                            "doctor_asignado_id" => $_POST["DoctorAsignado"]);
          
        }//Fin if
        
       
        $query = Conexion::conectar()->prepare("INSERT INTO citas (propietario_id, nombre_mascota, edad, raza, 
        tipo_mascota, hora_cita, fecha_cita, sexo_mascota, problematica, doctor_asignado_id) 
        VALUES(:propietario_id,:nombre_mascota,:edad, :raza,:tipo_mascota,:hora_cita,:fecha_cita,:sexo_mascota,:problematica, :doctor_asignado_id)"
        );
       

        $query->bindParam(":propietario_id",$datos['propietario_id'],PDO::PARAM_STR);
        $query->bindParam(":nombre_mascota",$datos['nombre_mascota'],PDO::PARAM_STR);
        $query->bindParam(":edad",$datos['edad'],PDO::PARAM_STR);
        $query->bindParam(":raza",$datos['raza'],PDO::PARAM_STR);
        $query->bindParam(":tipo_mascota",$datos['tipo_mascota'],PDO::PARAM_STR);
        $query->bindParam(":hora_cita",$datos['hora_cita'],PDO::PARAM_STR);
        $query->bindParam(":fecha_cita",$datos['fecha_cita'],PDO::PARAM_STR);
        $query->bindParam(":sexo_mascota",$datos['sexo_mascota'],PDO::PARAM_STR);
        $query->bindParam(":problematica",$datos['problematica'],PDO::PARAM_STR);
        $query->bindParam(":doctor_asignado_id",$datos['doctor_asignado_id'],PDO::PARAM_STR);

        if(  $query->execute()){
            return  header("Location:index.php");
        }else{
            return 'error en citya';

        }

        // INSERT INTO citas (propietario_id, nombre_mascota, edad, raza, 
        // tipo_mascota, hora_cita, fecha_cita, sexo_mascota, problematica, doctor_asignado_id) 
        // VALUES( '2', 'juanes', '2', 'gato','tiburon', '12', '12:30', 'macho', 'no come', '2');
    
    
    }//funcion crearCita

    public function actualizarCita(){

        if(isset($_POST['actualizarnombre'])){
           
            
            if(isset($_POST["actualizarnombre"])){
                $datos = array( "id" =>$_POST["id"],
                                "propietario_id"=> $_POST["actualizarnombre"],
                                "nombre_mascota" => $_POST["actualizarnombreMascota"],
                                "edad" => $_POST["actualizaredad"],
                                "raza" => $_POST["actualizarraza"],
                                "tipo_mascota" => $_POST["actualizartipoAnimal"],
                                "sexo_mascota" => $_POST["actualizarSexo"],
                                "problematica" => $_POST["actualizarpadecimiento"],
                                "hora_cita" => $_POST["actualizarhora"],
                                "fecha_cita" => $_POST["actualizardia"],
                                "doctor_asignado_id" => $_POST["actualizarDoctorAsignado"]);
              
            }//Fin if
    

            $query = Conexion::conectar()->prepare("UPDATE citas SET propietario_id=:propietario_id, nombre_mascota=:nombre_mascota, edad=:edad, raza=:raza, 
            tipo_mascota=:tipo_mascota, hora_cita=:hora_cita, fecha_cita=:fecha_cita, sexo_mascota=:sexo_mascota, problematica=:problematica, doctor_asignado_id=:doctor_asignado_id WHERE id=:id");
           
    
            $query->bindParam(":propietario_id",$datos['propietario_id'],PDO::PARAM_STR);
            $query->bindParam(":nombre_mascota",$datos['nombre_mascota'],PDO::PARAM_STR);
            $query->bindParam(":edad",$datos['edad'],PDO::PARAM_STR);
            $query->bindParam(":raza",$datos['raza'],PDO::PARAM_STR);
            $query->bindParam(":tipo_mascota",$datos['tipo_mascota'],PDO::PARAM_STR);
            $query->bindParam(":hora_cita",$datos['hora_cita'],PDO::PARAM_STR);
            $query->bindParam(":fecha_cita",$datos['fecha_cita'],PDO::PARAM_STR);
            $query->bindParam(":sexo_mascota",$datos['sexo_mascota'],PDO::PARAM_STR);
            $query->bindParam(":problematica",$datos['problematica'],PDO::PARAM_STR);
            $query->bindParam(":doctor_asignado_id",$datos['doctor_asignado_id'],PDO::PARAM_STR);
            $query->bindParam(":id",$datos['id'],PDO::PARAM_INT);

            $query->execute();

            if(  $query->execute()){
                return header("Location:index.php");
            }else{
                return 'no se pudo compa';
    
            }


        }else{

        }
    }

    static public function eliminarCita($id){
        $eliminar = Conexion::conectar()->prepare( "DELETE FROM citas WHERE id = $id"); //Declaramos consulta
        $eliminar->execute();
    }


static public function imprimirCitas(){

   $mostrar = Conexion::conectar()->prepare( "SELECT * FROM citas"); //Declaramos consulta
        $mostrar->execute(); //Ejecutamos la consulta 
        return $mostrar->fetchAll(); 
}

static public function imprimirCita($id){

    $mostrarUna = Conexion::conectar()->prepare( "SELECT * FROM citas WHERE id = $id "); //Declaramos consulta
         $mostrarUna->execute(); //Ejecutamos la consulta 
         return $mostrarUna->fetch();
 }
 



}//clase cita


$docs = Doctor::Registrar();
$instancia = Citas::crearCita();
$mostrarCitas =Citas::imprimirCitas();
