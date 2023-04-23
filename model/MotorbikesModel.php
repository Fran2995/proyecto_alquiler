<?php

    class MotorbikesModel{
        private $db;
        private $vehicles;

        public function __construct(){

            require_once("DataBase.php");
            $this->db=DataBase::conexion();
            $this->vehicles=array();
        }

        public function getVehicles(){

            require("paginationMotorbikes.php");
            $consult=$this->db->query("SELECT * FROM vehicles WHERE type = 'motorbike' 
            LIMIT $startFrom,$pageSize");

            while($rows=$consult->fetch(PDO::FETCH_ASSOC)){

                $this->vehicles[]=$rows;
            }
            return $this->vehicles;
        }





    }






?>