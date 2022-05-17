<?php

    class profileModel{
        public function __construct(){
            $this->db = new Model;
        }
    
        public function getUser($username){
            $this->db->query("SELECT * FROM user WHERE username = :username");
            $this->db->bind(':username',$username);
            return $this->db->getSingle();
        }

        public function updateProfile($userdata){
            $this->db->query("UPDATE user SET first_name=:first_name, last_name=:last_name WHERE user_id=:user_id");
            $this->db->bind(':user_id', $userdata['user_id']);
            $this->db->bind(':first_name', $userdata['first_name']);
            $this->db->bind(':last_name', $userdata['last_name']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function updatePassword($userdata){
            $this->db->query("UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id");
            $this->db->bind(':user_id', $userdata['user_id']);
            $this->db->bind(':password_hash', $userdata['new_pass_hash']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>