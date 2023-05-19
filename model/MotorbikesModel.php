<?php
require_once "Motorbike.php";
require_once "Database.php";

class MotorbikesModel
{

    private static function getMotorbikesArray(): array
    {
        return Database::getMotorbikes();
    }

    private static function getMotorbikesArrayWhitPagination($startFrom, $pagesize): array
    {
        return Database::getMotorbikesWhitPagination($startFrom, $pagesize);
    }

    public function getArrayOfObjectsMotorbike(): array
    {
        $motorbikesArray = self::getMotorbikesArray();
        return $this->extracted($motorbikesArray);
    }

    public function getArrayOfObjectsMotorbikeWhitPagination($startFrom, $pagesize)
    {
        $motorbikesArray = self::getMotorbikesArrayWhitPagination($startFrom, $pagesize);
        return $this->extracted($motorbikesArray);
    }

    /**
     * @param array $motorbikesArray
     * @return array
     */
    public function extracted(array $motorbikesArray): array
    {
        $motorbikesObjectArray = [];

        foreach ($motorbikesArray as $motorbike) {
            $motorbikesObjectArray [] = new Motorbike
            (
                $motorbike['id'],
                $motorbike['brand'],
                $motorbike['model'],
                $motorbike['cv'],
                $motorbike['year'],
                $motorbike['type'],
                $motorbike['price_per_day'],
                $motorbike['image'],
            );
        }
        return $motorbikesObjectArray;
    }

}
