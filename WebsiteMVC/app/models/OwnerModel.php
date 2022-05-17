<?php

    class OwnerModel {
        public function __construct(){
            $this->db = new Model;
        }

        public function getOrders(){
            $this->db->query("SELECT * FROM orders ORDER BY user_id");
            return $this->db->getResultSet();
        }

        public function getProducts(){
            $this->db->query("SELECT * FROM products");
            return $this->db->getResultSet();
        }

        public function getProduct($productId){
            $this->db->query("SELECT * FROM products WHERE productId=:id");
            $this->db->bind(':id', $productId);
            return $this->db->getSingle();
        }

        public function getCarts(){
            $this->db->query("SELECT * FROM cart ORDER BY user_id");
            return $this->db->getResultSet();
        }

        public function getUsers(){
            $this->db->query("SELECT * FROM user");
            return $this->db->getResultSet();
        }

        public function deleteUser($data){
            $this->db->query("DELETE FROM user WHERE user_id=:id");
            $this->db->bind('id',$data['ID']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        public function getAccess() {
            $this->db->query("SELECT isAdmin FROM user WHERE username=:id");
            $this->db->bind('id', $_SESSION['user_username']);
            return $this->db->getSingle();
        }

        public function addProduct($data) {
            $this->db->query("INSERT INTO products (productName, productShortDescription, productDescription, productType, previousPrice, actualPrice, material, quantity, isGift, pictureName)
                VALUES (:productName, :productShortDescription, :productDescription, :productType, :previousPrice, :actualPrice, :material, :quantity, :isGift, :pictureName)");
            $this->db->bind(':productName', $data['name']);
            $this->db->bind(':productShortDescription', $data['shortDescription']);
            $this->db->bind(':productDescription', $data['description']);
            $this->db->bind(':productType', $data['type']);
            $this->db->bind(':previousPrice', $data['previous']);
            $this->db->bind(':actualPrice', $data['actual']);
            $this->db->bind(':material', $data['material']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':isGift', $data['isGift']);
            $this->db->bind(':pictureName', $data['picture']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    
        public function updateProduct($data) {
            $this->db->query("UPDATE products SET productName=:productName, productShortDescription=:productShortDescription, productDescription=:productDescription, productType=:productType,
                                previousPrice=:previousPrice, actualPrice=:actualPrice, material=:material, quantity=:quantity, isGift=:isGift, pictureName=:pictureName WHERE productId=:Id");
            $this->db->bind(':productName', $data['name']);
            $this->db->bind(':productShortDescription', $data['shortDescription']);
            $this->db->bind(':productDescription', $data['description']);
            $this->db->bind(':productType', $data['type']);
            $this->db->bind(':previousPrice', $data['previous']);
            $this->db->bind(':actualPrice', $data['actual']);
            $this->db->bind(':material', $data['material']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':isGift', $data['isGift']);
            $this->db->bind(':pictureName', $data['picture']);
            $this->db->bind('Id', $data['id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    
        public function deleteProduct($data) {
            $this->db->query("DELETE FROM products WHERE productId=:id");
            $this->db->bind('id', $data['ID']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function profitSum() {
            $this->db->query("SELECT SUM(price) AS profit FROM orders");
            return $this->db->getResultSet();
        }
    }