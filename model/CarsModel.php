<?php

    class CarsModel{
        private $db;
        private $vehicles;

        public function __construct(){

            require_once("DataBase.php");
            $this->db=DataBase::conexion();
            $this->vehicles=array();
        }

        public function getVehicles(){

            require("paginationCars.php");
            $consult=$this->db->query("SELECT * FROM vehicles WHERE type = 'car' 
            LIMIT $startFrom,$pageSize");

            while($rows=$consult->fetch(PDO::FETCH_ASSOC)){

                $this->vehicles[]=$rows;
            }
            return $this->vehicles;
        }





    }






?>