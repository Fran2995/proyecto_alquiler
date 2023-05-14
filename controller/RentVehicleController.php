<?php

namespace App;

use Database;
use DateTime;
use Exception;

class RentVehicleController
{
    /**
     * @throws Exception
     */
    public function calculatePrice($dateStart, $dateFinish, $price): bool | int
    {
        $start = new DateTime($dateStart);
        $end = new DateTime($dateFinish);
        $different = $start->diff($end);
        $days = $different->days;

        echo  "<h4>&nbsp;&nbsp;El precio total es de ".$days * $price."€</h4>";
        return $days * $price;
    }

    /**
     * @throws Exception
     */
    public function validationDates($dateStart, $dateFinish)
    {
        $today = getdate();
        $todayFormat = $today['year']."-".$today['mon']."-".$today['mday'];
        $todayFormat = new DateTime($todayFormat);
        $start = new DateTime($dateStart);
        $end = new DateTime($dateFinish);
        if ($start >= $end) {
            echo "<div class='alert alert-danger' style='box-sizing: content-box;width: 100%;'>
                La fecha de reserva debe ser menor a la de entrega</div>";
            return false;
        }
        if ($todayFormat > $start) {

            echo "<div class='alert alert-danger' style='box-sizing: content-box;width: 100%;'>
                la fecha de recogida no puede ser menor a la actual (No alquilamos el DeLorean)</div>";
            return false;
        }
        return true;
    }

    public function isNotVehicleReserved($startDate, $finishDate, $vehicleId): bool
    {
    $vehicleReserve = Database::getVehicleReservedById($vehicleId);
    if($vehicleReserve) {
        foreach ($vehicleReserve as $reserve) {
            $vehicleReserveStartDate = $reserve['start_date'];
            $vehicleReserveEndDate = $reserve['end_date'];
            if ($startDate >= $vehicleReserveStartDate && $startDate <= $vehicleReserveEndDate ||
                $finishDate >= $vehicleReserveStartDate && $finishDate <= $vehicleReserveStartDate) {
                $vehicleReserveStartDateChangeFormat = date('d-m-Y', strtotime($vehicleReserveStartDate));
                $vehicleReserveEndDateChangeFormat = date('d-m-Y', strtotime($vehicleReserveEndDate));

                echo "<div class='alert alert-danger'>Este vehículo tiene una reserva hecha desde "
                    . $vehicleReserveStartDateChangeFormat . " hasta " . $vehicleReserveEndDateChangeFormat . "</div>";
                return false;
            }
        }
    }
        return true;
    }

}