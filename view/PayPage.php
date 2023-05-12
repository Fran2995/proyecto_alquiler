<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <div style="box-sizing: content-box;width: 40%;">
    </div>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Pago</p>



                                    <form class="mx-1 mx-md-4" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="name" id="form3Example1c" class="form-control"
                                                       placeholder="Número de tarjeta de crédito"
                                                       value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>"/>
                                                <label class="form-label" for="form3Example1c"></label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="surname" id="form3Example1c" class="form-control"
                                                       placeholder="MM-YYYY"
                                                       value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];}?>" />
                                                <label class="form-label" for="form3Example1c"></label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="email" id="form3Example3c" class="form-control"
                                                       placeholder="CVV"
                                                       value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" />
                                                <label class="form-label" for="form3Example3c"></label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="phone" id="form3Example1c" class="form-control"
                                                       placeholder="Nombre del titular"
                                                       value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>" />
                                                <label class="form-label" for="form3Example1c"></label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="" name="password" id="form3Example4c" class="form-control"
                                                       placeholder="Caducidad"/>
                                                <label class="form-label" for="form3Example4c"></label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="send" style="margin-right: 100px"
                                                    class="btn btn-secondary btn-lg">Cancelar</button>
                                            <button type="submit" name="send" class="btn btn-success btn-lg">Pagar</button>
                                        </div>


                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="templates/images/fondo_registro.avif"
                                         class="img-fluid" alt="Imagen de pareja en coche">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include("templates/footer.php");?>