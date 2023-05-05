<?php

require_once "../model/DataBase.php";
require_once "../model/User.php";

class UserController
{
    public static function getObjectUserByEmail($email):User
    {
      $user =  DataBase::getUserByEmail($email);
        return new User($user['id'], $user['name'], $user['surname'],
            $user['email'], $user['password'], $user['telephone'], $user['type']);
    }

}