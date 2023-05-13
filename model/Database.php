<?php
    class Database{
        public static function connexion(){

try{
    $connection=new PDO("mysql:host=localhost; dbname=rent_vehicles",'root','');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){
    die ("Error de conexión con base de datos: ".$e->getMessage());

}
return $connection;
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

        public static function setNewUser($name, $surname, $email, $phone, $password): void
        {
            $connection = self::connexion();
            $result = $connection->prepare("INSERT INTO users 
            (name, surname, email, password, telephone)
            VALUES (:name, :surname, :email, :password, :phone)");
            $result->execute(array(":name"=>$name, ":surname"=>$surname,
                ":email"=>$email, ":password"=>$password, "phone"=>$phone));
            $connection = null;
        }

        public static function getNumberOfUserByEmail($email): int
        {
            $connection = self::connexion();
            $resultFind = $connection->prepare("SELECT email FROM users WHERE email = :email");
            $resultFind->execute(array(":email"=>$email));
            $numRowsFind = $resultFind->rowCount();
            $connection = null;
            return $numRowsFind;
        }

        public static function getUserByEmail($email): array | false
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM users WHERE email = :email");
            $result->execute(array(":email"=>$email));
            $user = $result->fetch(PDO::FETCH_ASSOC);
            $connection = null;
            return $user;
        }

        public static function getIdUserByEmail($email): int
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT id FROM users WHERE email = :email");
            $result->execute(array(":email"=>$email));
            $user = $result->fetch(PDO::FETCH_ASSOC);
            $id = $user['id'];
            $connection = null;
            return (int) $id;
        }

        public static function getAllUsers(): array | false
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM users");
            $user = $result->fetchAll(PDO::FETCH_ASSOC);
            $connection = null;
            return $user;
        }

        public static function setNewVehicleReserve($userId, $vehicleId, $startDate, $endDate, $totalPrice): void
        {
            $connection = self::connexion();
            $result = $connection->prepare("INSERT INTO reservations 
            (user_id, vehicle_id, start_date, end_date, total_price)
            VALUES (:userId, :vehicleId, :startDate, :endDate, :totalPrice)");
            $result->execute(array(":userId"=>$userId, ":vehicleId"=>$vehicleId, ":startDate"=>$startDate,
                ":endDate"=>$endDate, ":totalPrice"=>$totalPrice));
            $connection = null;
        }

        public static function getVehicleReservedById($vehicleId): bool|array
        {
            $connection = self::connexion();
            $result = $connection->prepare("SELECT * FROM reservations WHERE vehicle_id = :vehicleId");
            $result->execute(array(":vehicleId"=> $vehicleId));
            $reserve = $result->fetchAll(PDO::FETCH_ASSOC);
            $connection = null;
            if($reserve) {
                return $reserve;
            }
            return false;
        }
 }
