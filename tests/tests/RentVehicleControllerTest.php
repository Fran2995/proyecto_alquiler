<?php

namespace tests;

use App\RentVehicleController;
use PHPUnit\Framework\TestCase;

class RentVehicleControllerTest extends TestCase
{

    /**
     * @throws \Exception
     */
    public function testCalculatePrice()
    {
        $rentVehicleController = new RentVehicleController();

        $this->assertEquals("200", $rentVehicleController->calculatePrice(
            "2023-08-17", "2023-08-19", "100"));
    }

    /**
     * @throws \Exception
     */
    public function testValidationDatesWhitAReservationDateBiggerThanDeliveryDate()
    {
        $rentVehicleController = new RentVehicleController();

        $this->assertFalse($rentVehicleController->validationDates("2059-08-17", "2059-08-16"));
    }

    /**
     * @throws \Exception
     */
    public function testValidationDatesWhitAReservationDateSmallerThanActually()
    {
        $rentVehicleController = new RentVehicleController();

        $this->assertFalse($rentVehicleController->validationDates("2023-04-17", "2023-08-16"));
    }

    public function testValidationDatesWhitACorrectReservationDates()
    {
        $rentVehicleController = new RentVehicleController();

        $this->assertTrue($rentVehicleController->validationDates("2059-08-17", "2059-08-20"));
    }
}
