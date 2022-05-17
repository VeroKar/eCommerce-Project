<?php
class loginModel
{
    /*
     * Default constructor
     */
    public function __construct()
    {
        $this->db = new Model;
    }

    /*
     * Gets the user information from the database
     */
    public function getUser($username)
    {
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->getSingle();
    }

    /*
     * Creates the user and save it to the database
     */
    public function createUser($data)
    {
        $this->db->query("INSERT INTO user (username, first_name, last_name, password_hash, email) 
            values (:username, :first_name, :last_name, :pass_hash, :email)");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':pass_hash', $data['pass_hash']);
        $this->db->bind(':email', $data['email']);
        return $this->db->execute();
    }

    /*
     * Gets 15% discount on first order
     */
    public function getSignUpDiscount()
    {
        $this->db->query("SELECT * FROM user WHERE gotFirstDiscount = 0");
        return $this->db->getResultSet();
    }
}
