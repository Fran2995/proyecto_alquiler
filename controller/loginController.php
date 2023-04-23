<?php

    if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])){

        $emailLogin= $_POST['emailLogin'];
        $passwordLogin= $_POST['passwordLogin'];

    }

    try{

    require("model/DataBase.php");
    DataBase::conexion();
    }catch(Exception $e){
        die("Error de conexión ".$e->getMessage());
    }finally{
       
    }



?>
