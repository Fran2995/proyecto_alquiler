
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
<a href="<?php if(isset($_SESSION['userName']) || isset($_COOKIE['saveSession']))
    {echo "rentVehicle.php?brand=".$vehicle->getBrand()."&model=".$vehicle->getModel()
        ."&image=".$vehicle->getImage()."&price=".$vehicle->getPrice();}
   else {echo "register.php";} ?>" class="btn btn-primary"><?php if(isset($_SESSION['userName']) || isset($_COOKIE['saveSession'])) {echo "Alquilar";}
   else {echo "Ir a registro";} ?></a>
</div>
</div>
