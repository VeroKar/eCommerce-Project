<?php

    class searchModel{
        public function __construct(){
            $this->db = new Model;
        }

        public function searchProducts($searchTerms)
        {
            $this->db->query("SELECT * FROM products WHERE productName LIKE :searchTerms 
                OR productShortDescription LIKE :searchTerms 
                OR productDescription LIKE :searchTerms 
                OR productType LIKE :searchTerms 
                OR material LIKE :searchTerms");
            $searchTerms = "%$searchTerms%";
            $this->db->bind(':searchTerms',$searchTerms);
            return $this->db->getResultSet();
        }
    }
?>