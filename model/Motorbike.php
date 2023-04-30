<?php

class Motorbike extends Vehicle
{

    public function __construct
    (
        $id,
        $brand,
        $model,
        $cv,
        $year,
        $type,
        $price,
        $image
    )
    {
        parent::__construct($id, $brand, $model, $cv, $year, $type, $price, $image);

    }

}