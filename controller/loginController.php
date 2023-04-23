<?php

    try{

    require("model/DataBase.php");
    DataBase::conexion();
    }catch(Exception $e){
        die("Error de conexión ".$e->getMessage());
    }finally{
        
    }



?>