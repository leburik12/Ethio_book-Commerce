<?php

class AdminStuff
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    /*
     *  Get All seller
     */
    public function getAllSeller()
    {
        $this->db->query("SELECT * FROM seller");
        $row = $this->db->resultset();
        if ($this->db->resultset() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getRateSold()
    {
        $this->db->query("SELECT sold,rating,language from book");
        $result = $this->db->resultset();

        return $result;
    }

    public function adminLogin($data)
    {

        $this->db->query("SELECT * FROM user WHERE user_name = :user_name AND password = :password");
        $this->db->bind(":user_name", $data['user_name']);
        $this->db->bind(":password", $data['password']);
        $row = $this->db->single();

        // if ($this->db->rowCount() > 0) {
        //     $this->setUserData($row, $is_seller);
        //     return true;
        // } else {
        //     return false;
        // }

        if ($this->db->rowCount() > 0) {
            $this->setUserData($row);
            return true;
        } else {
            return false;
        }
    }

    public function setUserData($row)
    {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['user_name'] = $row->user_name;
        if ($row->is_admin === 't') {
            $_SESSION['is_admin'] = 't';
        }
    }
}
