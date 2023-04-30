<?php

include_once 'Vehicle.php';

class Car extends Vehicle
{
    private $transmission;
    private $fuel;
    private $capacity;

    public function __construct
    (
        $id,
        $brand,
        $model,
        $cv,
        $year,
        $type,
        $transmission,
        $fuel,
        $capacity,
        $price,
        $image
    )
    {
        parent::__construct($id, $brand, $model, $cv, $year, $type, $price, $image);
        $this->transmission = $transmission;
        $this->fuel = $fuel;
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * @param mixed $transmission
     */
    public function setTransmission($transmission): void
    {
        $this->transmission = $transmission;
    }

    /**
     * @return mixed
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * @param mixed $fuel
     */
    public function setFuel($fuel): void
    {
        $this->fuel = $fuel;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity): void
    {
        $this->capacity = $capacity;
    }
}
