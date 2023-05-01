<?php include("templates/header.php"); ?>
    <source srcset="templates/images/view_cars.png" type="image/png">
    <img width="50%" style="margin:13px" src="templates/images/view_cars.jpg"
         class="img-fluid" alt="Fondo de audi a5">
<?php

require_once '../model/CarsModel.php';

$vehicles = new CarsModel();
$vehicles = $vehicles->getArrayOfObjectsCar();
require_once '../model/pagination.php';

$counter = 0;
foreach ($vehicles as $position => $vehicle):
    if ($counter % 4 == 0) {
        echo '<div style="display: flex; margin-left:10px;">';
        //echo '<div style="display: none; margin:0;">';
    }
    ?>

    <div class="card" style="width:18rem;">
        <img height="60%" src="templates/images/<?php echo $vehicle->getImage(); ?>" class="card-img-top"
             alt="Imagen de coche">
        <div class="card-body">
            <h5 class="card-title"><?php echo $vehicle->getBrand() . " " . $vehicle->getModel() ?></h5>
            <p class="card-text">
                <b>Caballos: </b><?php echo $vehicle->getCv() ?><br/>
                <b>Nº plazas: </b><?php echo $vehicle->getCapacity() ?><br/>
                <b>Transmisión: </b><?php echo $vehicle->getTransmission() ?><br/>
                <b>Combustible: </b><?php echo $vehicle->getFuel() ?><br/>
                <b>Año: </b><?php echo $vehicle->getYear() ?><br/>
                <b>Precio por día: </b><?php echo $vehicle->getPrice() ?></p>
            <a href="#" class="btn btn-primary">Alquilar</a>
        </div>
    </div>

    <?php
    $counter++;
    if ($counter % 4 == 0) {
        echo '</div>';
    }
endforeach;


?>

<?php
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