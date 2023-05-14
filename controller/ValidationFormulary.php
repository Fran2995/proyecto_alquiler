<?php

namespace App;
use Database;

class ValidationFormulary
{

    public function nameValid($name):bool
    {
        if($name == "")
        {
            echo "<div class='alert alert-danger'>Debe poner un nombre</div>";
            return false;
        }
        if(preg_match('/\d/', $name))
        {
            echo "<div class='alert alert-danger'>El nombre no puede incluir números</div>";
            return false;
        }

        return true;
    }

    public function surnameValid($surname):bool
    {
        if($surname == "")
        {
            echo "<div class='alert alert-danger'>Debe poner los apellidos</div>";
            return false;
        }
        if(preg_match('/\d/', $surname))
        {
            echo "<div class='alert alert-danger'>Los apellidos no puede incluir números</div>";
            return false;
        }

        return true;
    }

    public function emailValid($email):bool
    {
        if($email == "")
        {
            echo "<div class='alert alert-danger'>Debe poner un email</div>";
            return false;
        }
        if(!str_ends_with($email, ".com"))
        {
            echo "<div class='alert alert-danger'>El email no es válido</div>";
            return false;
        }
        return true;
    }

    public function telephoneValid($phone):bool
    {
        if($phone == "")
        {
            echo "<div class='alert alert-danger'>Debe poner un teléfono</div>";
            return false;
        }
        if(!is_numeric($phone) || strlen($phone) < 9
            || strlen($phone) > 9)
        {
            echo "<div class='alert alert-danger'>Debe poner un número de teléfono válido</div>";
            return false;
        }
        return true;
    }

    public function validPasswords($password1, $password2):bool
    {
        if($password1 == "" || $password2 == "")
        {
            echo "<div class='alert alert-danger'>Los dos campos de contraseña deben rellenarse</div>";
            return false;
        }
        if(strlen($password1) < 4)
        {
            echo "<div class='alert alert-danger'>La contraseña debe ser tener mínimo 4 caracteres</div>";
            return false;
        }
        if($password1 != $password2)
        {
            echo "<div class='alert alert-danger'>Las contraseñas no coinciden</div>";
            return false;
        }
        return true;
    }

    public function emailUserNoExist($email):bool
    {
    if(Database::getNumberOfUserByEmail($email) > 0)
    {
        echo "<div class='alert alert-danger'>El usuario ya existe</div>";
        return false;
    }
    return true;
    }
}