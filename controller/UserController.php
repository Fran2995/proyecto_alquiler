<?php

require_once "../model/DataBase.php";
require_once "../model/User.php";

class UserController
{
    public static function getObjectUserByEmail($email):User | false
    {
      $user =  DataBase::getUserByEmail($email);
      if (!$user) {
          return false;
      }
        return new User($user['id'], $user['name'], $user['surname'],
            $user['email'], $user['password'], $user['telephone'], $user['type']);
    }

}