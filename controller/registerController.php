<?php

require_once "ValidationFormulary.php";
require_once "../model/DataBase.php";
use App\ValidationFormulary;

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) &&
isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['password2'])) {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);
    $validationFormulary = new ValidationFormulary();

    if($validationFormulary->nameValid($_POST['name']) &&
    $validationFormulary->surnameValid($_POST['surname']) &&
    $validationFormulary->emailValid($_POST['email']) &&
    $validationFormulary->telephoneValid($_POST['phone']) &&
    $validationFormulary->validPasswords($_POST['password'], $_POST['password2']) &&
    $validationFormulary->emailUserExist($_POST['email']))
    {
        if(isset($_POST['checkbox'])) {
            DataBase::setNewUser($name, $surname, $email, $phone, $password);
            echo "<div class='alert alert-success'>Registro insertado con éxito</div>";
        }else
        {
            echo "<div class='alert alert-danger'>Debe aceptar los terminos de servicio</div>";
        }
    }

}

