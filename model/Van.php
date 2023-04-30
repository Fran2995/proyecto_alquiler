<?php

class Van extends Vehicle
{
    private $transsmision;
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
        $transsmision,
        $fuel,
        $capacity,
        $price,
        $image
    )
    {
        parent::__construct($id, $brand, $model, $cv, $year, $type, $price, $image);
        $this->transsmision = $transsmision;
        $this->fuel = $fuel;
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getTranssmision()
    {
        return $this->transsmision;
    }

    /**
     * @param mixed $transsmision
     */
    public function setTranssmision($transsmision): void
    {
        $this->transsmision = $transsmision;
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
