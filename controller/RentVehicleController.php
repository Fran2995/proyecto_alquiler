<?php

class RentVehicleController
{
    /**
     * @throws Exception
     */
    public function calculatePrice($dateStart, $dateFinish, $price): bool
    {
        $today = getdate();
        $todayFormat = $today['year']."-".$today['mon']."-".$today['mday'];
        $todayFormat = new DateTime($todayFormat);
        $start = new DateTime($dateStart);
        $end = new DateTime($dateFinish);
        $different = $start->diff($end);
        $days = $different->days;
        if ($start >= $end) {
            echo "<div class='alert alert-danger' style='box-sizing: content-box;width: 100%;'>
                La fecha de reserva debe ser menor a la de entrega</div>";
            return false;
        }
        if ($todayFormat > $start) {

            echo "<div class='alert alert-danger' style='box-sizing: content-box;width: 100%;'>
                la fecha de recogida no puede ser menor a la actual (No alquilamos el delorean)</div>";
            return false;
        }

        echo  "<h4>&nbsp;&nbsp;El precio total es de ".$days * $price."€</h4>";
        return true;
    }

}