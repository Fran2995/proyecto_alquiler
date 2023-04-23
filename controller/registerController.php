<?php

require("../model/DataBase.php");

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) &&
isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['password2'])){

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);
$password2 = md5($_POST['password2']);
$validNumber = true;



if (empty($_POST['name'])){

    echo "<div class='alert alert-danger'>Debe poner un nombre</div>";
}
if(empty($_POST['surname'])){

    echo "<div class='alert alert-danger'>Debe poner los apellidos</div>";

}
if(empty($_POST['email'])){

    echo "<div class='alert alert-danger'>Debe poner un email</div>";

}
if(empty($_POST['phone'])){

    echo "<div class='alert alert-danger'>Debe poner un teléfono</div>";

}else if(!is_numeric($_POST['phone']) || strlen($_POST['phone'])<9 
|| strlen($_POST['phone'])>9){ 
    echo "<div class='alert alert-danger'>Debe poner un número válido</div>"; 
    $validNumber = false;

}
if(empty($_POST['checkbox'])){

    echo "<div class='alert alert-danger'>Debe aceptar los terminos de servicio</div>";

}
if(empty($_POST['password']) || empty($_POST['password2'])){

    echo "<div class='alert alert-danger'>Los dos campos de contraseña deben rellenarse</div>";

}
if ($_POST['name']!="" && $_POST['surname']!="" && $_POST['email']!="" 
&& $_POST['phone']!="" && $_POST['password']!="" && $_POST['password2']!="" 
&& isset($_POST['checkbox'])!="" && $validNumber){
     if($password==$password2){

     
 
try{

$connect = DataBase::conexion();
$query = "INSERT INTO users (name, surname, email, password, telephone)
VALUES (:nam, :surnam, :emai, :passwor, :phon)";
$result = $connect->prepare($query);
$result->execute(array(":nam"=>$name, ":surnam"=>$surname, 
":emai"=>$email, ":passwor"=>$password, "phon"=>$phone));
echo "<div class='alert alert-success'>Registro insertado con éxito</div>";
    }catch(Exception $e){
        die ("Error de conexión ".$e->getMessage());
    }finally{
        $connect=null;
    }


     }else{
        echo "<div class='alert alert-danger'>Las dos contraseñas no coinciden</div>";
     }
     }
    }
?>
