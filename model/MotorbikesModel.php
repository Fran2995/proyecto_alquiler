<?php
require_once "Motorbike.php";
require_once "DataBase.php";

class MotorbikesModel
{

    private static function getMotorbikesArray(): array
    {
        return DataBase::getMotorbikes();
    }

    private static function getMotorbikesArrayWhitPagination($startFrom, $pagesize): array
    {
        return DataBase::getMotorbikesWhitPagination($startFrom, $pagesize);
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

?>