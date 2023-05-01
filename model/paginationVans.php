<?php

include_once "VansModel.php";

$pageSize = 8;

if (isset($_GET['page'])) {
    if ($_GET['page'] == 1) {
        header("Location:vans.php");
    } else {
        $page = $_GET['page'];
    }
} else {
    $page = 1;
}

$vehicles = new VansModel();
$vehiclesTotal = $vehicles->getArrayOfObjectsVan();
$startFrom = ($page - 1) * $pageSize;
$numberOfRows = count($vehiclesTotal);
$pagesTotal = ceil($numberOfRows / $pageSize);
$vehiclesPagination = $vehicles->getArrayOfObjectsVanWhitPagination($startFrom, $pageSize);
?>