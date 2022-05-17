<?php

    class faqModel{
        public function __construct(){
            $this->db = new Model;
        }

        public function getFAQs()
        {
            $this->db->query("SELECT * FROM FAQs");
            return $this->db->getResultSet();
        }
    }
?>