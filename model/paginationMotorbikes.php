<?php

include_once "MotorbikesModel.php";

$pageSize = 8;

if (isset($_GET['page'])) {
    if ($_GET['page'] == 1) {
        header("Location:motorbikes.php");
    } else {
        $page = $_GET['page'];
    }
} else {
    $page = 1;
}

$vehicles = new MotorbikesModel();
$vehiclesTotal = $vehicles->getArrayOfObjectsMotorbike();
$startFrom = ($page - 1) * $pageSize;
$numberOfRows = count($vehiclesTotal);
$pagesTotal = ceil($numberOfRows / $pageSize);// No está llegando valor
$vehiclesPagination = $vehicles->getArrayOfObjectsMotorbikeWhitPagination($startFrom, $pageSize);
?>