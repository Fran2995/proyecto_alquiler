<?php
    class DataBase{
        public static function connexion(){

try{
    $conecction=new PDO("mysql:host=localhost; dbname=rent_vehicles",'root','');
    $conecction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){

    die ("Error de conexión con base de datos: ".$e->getMessage());
}
return $conecction;
    }

    public static function getCars()
    {
        $connection = self::connexion();
        $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'car'");
        $result->execute(array());
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

        public static function getMotorbikes(): array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'motorbikes'");
            $result->execute(array());
            return $result;
        }

        public static function getVans(): array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'van'");
            $result->execute(array());
            return $result;
        }
 }
?>