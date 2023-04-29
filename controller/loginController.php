<?php

require("../model/DataBase.php");

    if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])){

        $emailLogin= $_POST['emailLogin'];
        $passwordLogin= md5($_POST['passwordLogin']);

    

    try{

    $conectionLogin = DataBase::conexion();
    $queryLogin = "SELECT name, password FROM users WHERE email = :emailLogin";
     $resultLogin = $conectionLogin->prepare($queryLogin);
     $resultLogin->execute(array(":emailLogin"=>$emailLogin));
    $numRows = $resultLogin->rowCount();
    

    if($numRows==0){
        echo "El usuario no existe";
    }else{
        while($names=$resultLogin->fetch(PDO::FETCH_ASSOC))
        if($names['password']==$passwordLogin){
        echo "Hola ".$names['name'];
        }else{
            echo "Contraseña incorrecta";
        }
    }


    }catch(Exception $e){
        die("Error de conexión ".$e->getMessage().$_POST['emailLogin'].$passwordLogin);
    }finally{
       $conectionLogin = null;
    }


}




?>
