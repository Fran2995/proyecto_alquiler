<?php

require "UserController.php";

session_start();

    if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {

        $emailLogin = $_POST['emailLogin'];
        $passwordLogin = md5($_POST['passwordLogin']);

        $user = UserController::getObjectUserByEmail($emailLogin);


        if (!$user) {
            echo "<div class='alert alert-danger' 
            style='box-sizing: content-box;width: 40%;'>El usuario no existe</div>";
        } else {
            if ($user->getPassword() != $passwordLogin) {
                echo "<div class='alert alert-danger' 
                style='box-sizing: content-box;width: 40%;'>La contraseña no es correcta</div>";
            } else {
                $_SESSION['userName'] = $user->getName();
                $_SESSION['userEmail'] = $user->getEmail();
                if(isset($_POST['rememberMe'])) {
                    setcookie("saveSessionName",$_SESSION['userName'] , time()+2592000, '/');
                    setcookie("saveSessionEmail",$_SESSION['userEmail'] , time()+2592000, '/');
                }
            }
        }
    }

    if(isset($_POST['closeSession'])) {
        session_destroy();
        setcookie("saveSessionName", "nameOfSession", time()-1, '/');
        setcookie("saveSessionEmail", "nameOfSession", time()-1, '/');
        header("Location: " . $_SERVER['PHP_SELF']);
    }


        if (isset($_SESSION['userName']) || isset($_COOKIE['saveSessionName'])): ?>
<div>
<div style="text-align: right">
    <form method="post">
        <div class="container-fluid well span6">
            <div class="row">
                <div class="col-md-8">
                    <h1 style="text-align: left" class="display-4">Alquiler de vehículos Pamplona</h1>
                </div>
                <div class="col-md-4">
                    <img src="templates/images/perfil.png" height="60px" class="img-circle">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        <?php
                        if (isset($_SESSION['userName'])) {
                            echo $_SESSION['userName'];
                        }else{
                            echo $_COOKIE['saveSessionName'];
                        }
                        ?>
                    </h4>
                    <form method="post">
                        <button type="submit" name="closeSession" class="btn btn-primary">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>

    </form>
</div>


<?php else: ?>
            <div class="mb-0" style= "float:right">
                <form method="post">
                    <input type="email" class="form-control" name="emailLogin" id="email"
                           aria-describedby="emailHelpId" placeholder="Correo">
                    <input type="password" class="form-control" name="passwordLogin" id="password"
                           aria-describedby="emailHelpId" placeholder="Contraseña">
                    <button type="submit" name="butonLogin" id="" class="btn btn-primary"
                            role="button">Iniciar sesión</button>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="" name="rememberMe" value="rememberMe">
                        <label class="form-check-label" for="">recuérdame</label>
                    </div>
            </div>
            </form>
            </div>
            <h1 style="margin-left:13px"  class="display-4">Alquiler de vehículos Pamplona</h1>

<?php endif;
?>
