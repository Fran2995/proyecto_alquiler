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
        $resultFinal = $result->fetchAll(PDO::FETCH_ASSOC);
        $connection = null;
        return $resultFinal;
    }

        public static function getCarsWhitPagination($startFrom,$pageSize): array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'car' 
            LIMIT $startFrom, $pageSize");
            $result->execute(array());
            $resultFinal = $result->fetchAll(PDO::FETCH_ASSOC);
            $connection = null;
            return $resultFinal;
        }
        public static function getMotorbikes(): bool|array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'motorbike'");
            $result->execute(array());
            $resultFinal = $result->fetchAll(PDO::FETCH_ASSOC);
            $connection = null;
            return $resultFinal;
        }

        public static function getMotorbikesWhitPagination($startFrom,$pageSize): array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'motorbike' 
            LIMIT $startFrom, $pageSize");
            $result->execute(array());
            $resultFinal = $result->fetchAll(PDO::FETCH_ASSOC);
            $connection = null;
            return $resultFinal;
        }

        public static function getVans(): bool|array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'van'");
            $result->execute(array());
            $resultFinal = $result->fetchAll(PDO::FETCH_ASSOC);
            $connection = null;
            return $resultFinal;
        }

        public static function getVansWhitPagination($startFrom,$pageSize): array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM vehicles WHERE type = 'van' 
            LIMIT $startFrom, $pageSize");
            $result->execute(array());
            $resultFinal = $result->fetchAll(PDO::FETCH_ASSOC);
            $connection = null;
            return $resultFinal;
        }

        public static function setNewUser($name, $surname, $email, $phone, $password)
        {
            $connection = self::connexion();
            $result = $connection->prepare("INSERT INTO users (name, surname, email, password, telephone, type) VALUES (:name, :surname, :email, :password, :phone, 'user')");
            $result->execute(array(":name"=>$name, ":surname"=>$surname,
                ":email"=>$email, ":password"=>$password, "phone"=>$phone));
            $connection = null;
        }

        public static function getNumberOfUserWhitAnEmail($email)
        {
            $connection = self::connexion();
            $resultFind = $connection->prepare("SELECT email FROM users WHERE email = :email");
            $resultFind->execute(array(":email"=>$email));
            $numRowsFind = $resultFind->rowCount();
            $connection = null;
            return $numRowsFind;
        }
 }
?>