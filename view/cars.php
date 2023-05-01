<?php include("templates/header.php"); ?>
    <source srcset="templates/images/view_cars.png" type="image/png">
    <img width="50%" style="margin:13px" src="templates/images/view_cars.jpg"
         class="img-fluid" alt="Fondo de audi a5">
<?php

require_once '../model/paginationCars.php';

$counter = 0;
foreach ($vehiclesPagination as $position => $vehicle):
    if ($counter % 4 == 0) {
        echo '<div style="display: flex; margin-left:10px;">';
    }
  include "templates/cardOfVehicle.php";
    $counter++;
    if ($counter % 4 == 0) {
        echo '</div>';
    }
endforeach;


echo '<ul style="margin-left:10px;" class="pagination">';
for ($i = 1; $i <= $pagesTotal; $i++) {
    if (isset($_GET['page']) && $_GET['page'] == $i) {
        echo '<li class="page-item active">';
    } else if (!isset($_GET['page']) && $i == 1) {
        echo '<li class="page-item active">';
    } else {
        echo '<li class="page-item">';
    }


    echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
    echo '</li>';

}

echo '</ul>';

include("templates/footer.php"); ?>