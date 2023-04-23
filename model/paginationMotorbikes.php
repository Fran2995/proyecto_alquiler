<?php

require_once("DataBase.php");

$connect=DataBase::conexion();

$pageSize=8;

    if(isset($_GET['page'])){
        if($_GET['page']==1){
            header("Location:motorbikes.php");
        }else{
            $page=$_GET['page'];
        }    
    }else{
        $page=1;
    }

    $startFrom=($page-1)*$pageSize;
    $sqlMotorbikes="SELECT * FROM vehicles WHERE type = 'motorbike'";
    $result=$connect->prepare($sqlMotorbikes);
    $result->execute(array());
    $numberOfRows=$result->rowCount();
    $pagesTotal=ceil($numberOfRows/$pageSize);


?>