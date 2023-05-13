<?php

require_once "ValidationPayPage.php";
require_once "../model/Database.php";
$payDone = false;

if (isset($_POST['numberOfCard']) && isset($_POST['expirationDate'])
    && isset($_POST['cvv']) && isset($_POST['titularName'])) {

    $validationPayPage = new ValidationPayPage();


    if($validationPayPage->validNumberOfCard($_POST['numberOfCard']) &&
        $validationPayPage->validExpirationDate($_POST['expirationDate']) &&
        $validationPayPage->validCvv($_POST['cvv']) &&
        $validationPayPage->validTitularName($_POST['titularName']))
    {
        if(isset($_GET['vehicleId']) && isset($_GET['userEmail']))
        {
        $id = Database::getIdUserByEmail($_GET['userEmail']);
        Database::setNewVehicleReserve($id, $_GET['vehicleId'], $_GET['dateOfStart'],
            $_GET['dateOfFinish'], $_GET['totalPrice']);
            echo "<div class='alert alert-success'>Pago realizado con éxito</div>";
            $payDone = true;
        }
    }
}