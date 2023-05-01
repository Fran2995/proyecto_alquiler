<?php

    include_once "Car.php";

    class CarsModel
    {

        private static function getCarsArray(): array
        {
            $connexion = DataBase::connexion();

            return DataBase::getCars();
        }

        private static function getCarsArrayWhitPagination($startFrom, $pagesize): array
        {
            $connexion = DataBase::connexion();

            return DataBase::getCarsWhitPagination($startFrom, $pagesize);
        }

        public function getArrayOfObjectsCar(): array
        {
            $carsArray = self::getCarsArray();
            return $this->extracted($carsArray);
        }

        public function getArrayOfObjectsCarWhitPagination($startFrom, $pagesize)
        {
            $carsArray = self::getCarsArrayWhitPagination($startFrom, $pagesize);
            return $this->extracted($carsArray);
        }

        /**
         * @param array $carsArray
         * @return array
         */
        public function extracted(array $carsArray): array
        {
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