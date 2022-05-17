<?php

    class visitUsModel{
        public function __construct(){
            $this->db = new Model;
        }

        public function getStores(){
            $this->db->query("SELECT * FROM stores");
            return $this->db->getResultSet();
        }

        public function getStore($storeID){
            $this->db->query("SELECT * FROM stores WHERE storeID = :storeID");
            $this->db->bind(':storeID',$storeID);
            return $this->db->getSingle();
        }
    }
?>