<?php
include "templates/header.php";
if(isset($_POST['closeSession'])) {
    header("Location: index.php");
}
?>
</div>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Reserva de <?php echo $_GET['brand']." ".
                                    $_GET['model']?></p>



                                <form class="mx-1 mx-md-4" action="" method="post">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="date" name="dateOfStart" id="form3Example1c" class="form-control"
                                                   value="<?php if(isset($_POST['dateOfStart'])) {
                                                       echo $_POST['dateOfStart'];} ?>"/>
                                            <label class="form-label" for="form3Example1c">Fecha de la reserva</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="date" name="dateOfFinish" id="form3Example1c" class="form-control"
                                                   value="<?php if(isset($_POST['dateOfFinish'])) {
                                                       echo $_POST['dateOfFinish'];} ?>" />
                                            <label class="form-label" for="form3Example1c">Fecha de entrega</label>
                                        </div>
                                    </div>

                                    <?php
                                    require "../controller/RentVehicleController.php";
                                    if (isset($_POST['dateOfStart']) && isset($_POST['dateOfFinish'])) {
                                        $calculatePrice = new RentVehicleController();
                                        $today = getdate();
                                        $todayFormat = $today['year'] . "-" . $today['mon'] . "-" . $today['mday'];

                                        try {
                                            $totalPrice = $calculatePrice->calculatePrice($_POST['dateOfStart'],
                                                $_POST['dateOfFinish'], $_GET['price']);
                                        } catch (Exception $e) {
                                            echo "No se ha podido calcular el precio, intentalo de nuevo";
                                        }
                                    }
                                    ?>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name="send" style="color:blue" class="btn btn-secundary btn-lg">
                                            Calcular precio</button>
                                    </div>

                                    <?php if(isset($totalPrice) && $totalPrice): ?>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <a href="PayPage.php" class="btn btn-primary btn-lg active">
                                            Ir a pago</a>
                                    </div>
                                    <?php endif; ?>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="templates/images/<?php echo $_GET['image'] ?>"
                                     class="img-fluid" alt="Imagen del vehículo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "templates/footer.php"; ?>

</div>
