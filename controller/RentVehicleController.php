<?php

class RentVehicleController
{
    /**
     * @throws Exception
     */
    public function calculatePrice($dateStart, $dateFinish, $price) {
        $today = getdate();
        $todayFormat = $today['year']."-".$today['mon']."-".$today['mday'];
        $todayFormat = new DateTime($todayFormat);
        $start = new DateTime($dateStart);
        $end = new DateTime($dateFinish);
        $different = $start->diff($end);
        $days = $different->days;
        if ($start >= $end) {
            return "<div class='alert alert-danger' style='box-sizing: content-box;width: 100%;'>
                la fecha de reserva debe ser menor que la de entrega</div>";
        }
        if ($todayFormat > $start) {

            return "<div class='alert alert-danger' style='box-sizing: content-box;width: 100%;'>
                la fecha de recogida no puede ser menor a la actual (No alquilamos el delorean)</div>";
        }

        return  '<button type="button" style="margin-left: 30%; width: 40%;" class="btn btn-info">'.$days * $price.'€</button>';;

    }

}