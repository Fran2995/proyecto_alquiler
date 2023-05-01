<?php

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

$startFrom = ($page - 1) * $pageSize;
$numberOfRows = count($vehicles);
$pagesTotal = ceil($numberOfRows / $pageSize);
?>