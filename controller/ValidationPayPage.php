<?php

namespace App;

class ValidationPayPage
{

    public function validNumberOfCard($numberOfCard): bool
    {
        if($numberOfCard == "") {
            echo "<div class='alert alert-danger'>Debe poner un número de tarjeta</div>";
            return false;
        }
        $pattern = "/^\d{4}-\d{4}-\d{4}-\d{4}$/";
        if(!preg_match($pattern, $numberOfCard)) {
            echo "<div class='alert alert-danger'>el número de tarjeta debe separarse por guiones cada 4 números</div>";
            return false;
        }
        return true;
    }

    public function validExpirationDate($expirationDate): bool
    {
        if($expirationDate == "") {
            echo "<div class='alert alert-danger'>Debe poner la fecha de caducidad</div>";
            return false;
        }
        $pattern = "/^\d{2}-\d{2}$/";
        if(!preg_match($pattern, $expirationDate)) {
            echo "<div class='alert alert-danger'>La fecha de caducidad debe tener un guión después
            del mes con dos números por mes y año</div>";
            return false;
        }
        return true;
    }

    public function validCvv($cvv)
    {
        if($cvv == "") {
            echo "<div class='alert alert-danger'>Debe poner el número CVV</div>";
            return false;
        }
        if(!is_numeric($cvv) || strlen($cvv) <3 || strlen($cvv) >3) {
            echo "<div class='alert alert-danger'>El campo CVV debe contener solo 3 números</div>";
            return false;
        }
        return true;
    }

    public function validTitularName($titularName): bool
    {
        if($titularName == "") {
            echo "<div class='alert alert-danger'>Debe poner el nombre del titular</div>";
            return false;
        }
        if(preg_match('/\d/', $titularName)) {
            echo "<div class='alert alert-danger'>El nombre del titular no puede contener números</div>";
            return false;
        }
        return true;
    }

}