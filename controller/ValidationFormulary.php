<?php

class ValidationFormulary
{

    public static function nameValid($name)
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

    public static function surnameValid($surname)
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

    public static function emailValid($email)
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

    public static function telephoneValid($phone)
    {
        if($phone == "")
        {
            echo "<div class='alert alert-danger'>Debe poner un teléfono</div>";
        }
        if(!is_numeric($phone) || strlen($phone) < 9
            || strlen($phone) > 9)
        {
            echo "<div class='alert alert-danger'>Debe poner un número válido</div>";
            return false;
        }
        return true;
    }

    public static function validPasswords($password1, $password2)
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

    public static function emailUserExist($email)
    {
    if(DataBase::getNumberOfUserWhitAnEmail($email) > 0)
    {
        echo "<div class='alert alert-danger'>El usuario ya existe</div>";
        return false;
    }
    return true;
    }

}