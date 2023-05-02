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

    public static function getCars(): bool|array
    {
        $connection = self::connexion();
        $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'car'");
        $result->execute(array());
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

        public static function getCarsWhitPagination($startFrom,$pageSize): array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'car' 
            LIMIT $startFrom, $pageSize");
            $result->execute(array());
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function getMotorbikes(): bool|array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'motorbike'");
            $result->execute(array());
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getMotorbikesWhitPagination($startFrom,$pageSize): array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'motorbike' 
            LIMIT $startFrom, $pageSize");
            $result->execute(array());
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getVans(): bool|array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'van'");
            $result->execute(array());
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getVansWhitPagination($startFrom,$pageSize): array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'van' 
            LIMIT $startFrom, $pageSize");
            $result->execute(array());
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
 }
?>