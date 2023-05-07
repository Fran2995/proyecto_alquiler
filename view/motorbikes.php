<?php include("templates/header.php");?>
<source srcset="templates/images/suzuki_fondo.jfif" type="image/png">
    <img width="50%" style="margin:13px" src="templates/images/suzuki_fondo.jfif" 
    class="img-fluid" alt="Fondo de moto">
<?php
require_once "../model/paginationMotorbikes.php";


$counter=0;
foreach($vehiclesPagination as $vehicle):
if($counter%4==0){
    echo '<div style="display: flex; margin-left:10px;">';
}
?>

    <div class="card" style="width:18rem;">
        <img height="60%" src="templates/images/<?php echo $vehicle->getImage(); ?>" class="card-img-top"
             alt="Imagen de moto">
        <div class="card-body">
            <h5 class="card-title"><?php echo $vehicle->getBrand() . " " . $vehicle->getModel() ?></h5>
            <p class="card-text">
                <b>Caballos: </b><?php echo $vehicle->getCv() ?><br/>
                <b>Año: </b><?php echo $vehicle->getYear() ?><br/>
                <b>Precio por día: </b><?php echo $vehicle->getPrice() ?></p>
            <a href="<?php if(isset($_SESSION['userName']) || isset($_COOKIE['saveSession']))
            {echo "rentVehicle.php?brand=".$vehicle->getBrand()."&model=".$vehicle->getModel()
                ."&image=".$vehicle->getImage()."&price=".$vehicle->getPrice();}
            else {echo "register.php";} ?>" class="btn btn-primary"><?php if(isset($_SESSION['userName']) || isset($_COOKIE['saveSession'])) {echo "Alquilar";}
                else {echo "Ir a registro";} ?></a>
        </div>
    </div>

<?php 
    $counter++;
    if($counter%4==0){
        echo '</div>';
    }
endforeach;

 echo '<ul style="margin-left:10px;" class="pagination">';
for($i=1; $i<=$pagesTotal; $i++){
    if(isset($_GET['page']) && $_GET['page'] == $i){
        echo '<li class="page-item active">';
    }else if(!isset($_GET['page']) && $i == 1){
        echo '<li class="page-item active">';
    }else{
        echo '<li class="page-item">';
    }


        echo '<a class="page-link" href="?page='.$i.'">'.$i.'</a>';
        echo '</li>';

    }

echo '</ul>';

include("templates/footer.php"); ?>