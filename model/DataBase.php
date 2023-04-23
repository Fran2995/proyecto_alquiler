<?php
    class DataBase{
        public static function conexion(){

try{
    $conecction=new PDO("mysql:host=localhost; dbname=rent_vehicles",'root','');
    $conecction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){

    die ("Error de conexión con base de datos: ".$e->getMessage());
}
return $conecction;
    }
 }
?>