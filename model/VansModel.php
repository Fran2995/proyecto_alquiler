<?php
require_once "Van.php";
require_once "Database.php";

class VansModel
{

    private static function getVansArray(): array
    {
        return Database::getVans();
    }

    private static function getVansArrayWhitPagination($startFrom, $pagesize): array
    {
        return Database::getVansWhitPagination($startFrom, $pagesize);
    }

    public function getArrayOfObjectsVan(): array
    {
        $vansArray = self::getVansArray();
        return $this->extracted($vansArray);
    }

    public function getArrayOfObjectsVanWhitPagination($startFrom, $pagesize)
    {
        $vansArray = self::getVansArrayWhitPagination($startFrom, $pagesize);
        return $this->extracted($vansArray);
    }

    /**
     * @param array $vansArray
     * @return array
     */
    public function extracted(array $vansArray): array
    {
        $vansObjectArray = [];

        foreach ($vansArray as $van) {
            $vansObjectArray [] = new Van
            (
                $van['id'],
                $van['brand'],
                $van['model'],
                $van['cv'],
                $van['year'],
                $van['type'],
                $van['transmission'],
                $van['fuel_type'],
                $van['capacity'],
                $van['price_per_day'],
                $van['image'],
            );
        }
        return $vansObjectArray;
    }
}

?>