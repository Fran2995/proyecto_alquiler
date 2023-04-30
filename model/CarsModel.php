<?php

    include_once "Car.php";

    class CarsModel
    {

        public function __construct(){}

        private static function getCarsArray(): array
        {
            $connexion = DataBase::connexion();

            $result = $connexion->prepare("SELECT * FROM vehicles WHERE type = 'car'");
            $result->execute(array());
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getObjectCars(): array
        {
            $carsArray = self::getCarsArray();
            $carsObjectArray = [];

            foreach ($carsArray as $car)
            {
                $carsObjectArray [] = new Car
                (
                    $car['id'],
                    $car['brand'],
                    $car['model'],
                    $car['cv'],
                    $car['year'],
                    $car['type'],
                    $car['transmission'],
                    $car['fuel_type'],
                    $car['capacity'],
                    $car['price_per_day'],
                    $car['image'],
                );

            }
            return $carsObjectArray;
        }
    }


//        public function getVehicles(){
//
//            require("paginationCars.php");
//            $consult=$this->db->query("SELECT * FROM vehicles WHERE type = 'car'
//            LIMIT $startFrom,$pageSize");
//
//            while($rows=$consult->fetch(PDO::FETCH_ASSOC)){
//
//                $this->vehicles[]=$rows;
//            }
//            return $this->vehicles;
//        }
//
//
//
//
//
//    }






?>