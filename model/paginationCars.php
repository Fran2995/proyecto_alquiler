<?php

include_once "CarsModel.php";

$pageSize = 8;

if (isset($_GET['page'])) {
    if ($_GET['page'] == 1) {
        header("Location:cars.php");
    } else {
        $page = $_GET['page'];
    }
} else {
    $page = 1;
}

$vehicles = new CarsModel();
$vehiclesTotal = $vehicles->getArrayOfObjectsCar();
$startFrom = ($page - 1) * $pageSize;
$numberOfRows = count($vehiclesTotal);
$pagesTotal = ceil($numberOfRows / $pageSize);
$vehiclesPagination = $vehicles->getArrayOfObjectsCarWhitPagination($startFrom, $pageSize);
