<?php

require_once "ValidationFormulary.php";
require_once "../model/DataBase.php";

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) &&
isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['password2'])) {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);


    if(ValidationFormulary::nameValid($_POST['name']) &&
    ValidationFormulary::surnameValid($_POST['surname']) &&
    ValidationFormulary::emailValid($_POST['email']) &&
    ValidationFormulary::telephoneValid($_POST['phone']) &&
    ValidationFormulary::validPasswords($_POST['password'], $_POST['password2']) &&
    ValidationFormulary::emailUserExist($_POST['email']))
    {
    DataBase::setNewUser($name, $surname, $email, $phone, $password);
        echo "<div class='alert alert-success'>Registro insertado con éxito</div>";
    }

}

