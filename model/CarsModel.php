<?php

    include_once "Car.php";

    class CarsModel
    {

        private static function getCarsArray(): array
        {
            $connexion = DataBase::connexion();

            return DataBase::getCars();
        }

        public function getArrayOfObjectsCar(): array
        {
            $carsArray = self::getCarsArray();
            $carsObjectArray = [];

            foreach ($carsArray as $car) {
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









?>