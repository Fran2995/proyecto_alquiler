<?php include("templates/header.php");?>
<div style="box-sizing: content-box;width: 40%;">
<?php include("../controller/registerController.php");?>
</div>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registro</p>
                
                

                <form class="mx-1 mx-md-4" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="name" id="form3Example1c" class="form-control"
                      value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>"/>
                      <label class="form-label" for="form3Example1c">Nombre</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="surname" id="form3Example1c" class="form-control"
                      value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];}?>" />
                      <label class="form-label" for="form3Example1c">Apellidos</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" id="form3Example3c" class="form-control"
                      value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" />
                      <label class="form-label" for="form3Example3c">Correo eléctronico</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="phone" id="form3Example1c" class="form-control" 
                      value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>" />
                      <label class="form-label" for="form3Example1c">Teléfono</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password" id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">Contraseña</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password2" id="form3Example4cd" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Repite tu contraseña</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" name="checkbox"
                     value="terminos" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      Acepto los <a href="termsAndConditions.html">Términos de servicio</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="send" class="btn btn-primary btn-lg">Registrarse</button>
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