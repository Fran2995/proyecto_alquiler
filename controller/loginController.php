<?php

require "UserController.php";

    if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])){

        $emailLogin= $_POST['emailLogin'];
        $passwordLogin= md5($_POST['passwordLogin']);

        $user = UserController::getObjectUserByEmail($emailLogin);

        if($user->getEmail() == $emailLogin)
        {
            if($user->getPassword() == $passwordLogin)
            {
                echo "Bienvenido ".$user->getName();
            }else
            {
                echo "La contraseña no es correcta";
            }
        }else
        {
            echo "El usuarion no existe";
        }







}




?>
