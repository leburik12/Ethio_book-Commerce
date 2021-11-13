<?php

class Account
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /*
     * Seller account form
     */
    public function create_seller($data)
    {
        $this->db->query("INSERT INTO seller (first_name, last_name, user_name, email, password, phone_number) VALUES (:first_name, :last_name, :user_name, :email, :password, :phone_number)");

        // Bind values
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':user_name', $data['user_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':phone_number', $data['phone_number']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /*
     * Check if username is unique
     */
    public function isUsernameUnique($user_name, $db)
    {
        $this->db->query("SELECT * FROM $db WHERE user_name = :user_name");

        // Bind Values
        $this->db->bind(':user_name', $user_name);
        $row = $this->db->single();

        // if we got a user 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    /*
     * Register User
     */
    public function register($data)
    {
        // Insert Query
        $this->db->query("INSERT INTO user (user_name, email, phone_number, password) VALUES (:user_name, :email, :phone_number, :password)");

        // Bind Values
        $this->db->bind(':user_name', $data['user_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone_number']);
        $this->db->bind(':password', $data['password']);

        // if execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /*
     * Login User
     */
    public function login($data, $is_seller)
    {
        if ($is_seller == true) {
            $this->db->query("SELECT * FROM seller WHERE user_name = :user_name AND password =:password");
            $this->db->bind(":user_name", $data['user_name']);
            $this->db->bind(":password", $data['password']);
        } elseif ($is_seller == false) {
            $this->db->query("SELECT * FROM user WHERE user_name = :user_name AND password =:password");
            $this->db->bind(":user_name", $data['user_name']);
            $this->db->bind(":password", $data['password']);
        }
        $row = $this->db->single();
        // check Rows
        if ($this->db->rowCount() > 0) {
            $this->setUserData($row, $is_seller);
            return true;
        } else {
            return false;
        }
    }
    /*
     * Set User data
     */
    public function setUserData($row, $seller)
    {
        $_SESSION['is_author'] = $row->is_author;
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['user_name'] = $row->user_name;
        if ($seller == true) {
            $_SESSION['is_seller'] = true;
        }
        if ($row->is_admin == 't') {
            $_SESSION['is_admin'] = 't';
        }
    }
    /*
     * check if the user is logged in
     */
    public function loggedIn()
    {
        if (isset($_SESSION['logged_in'])) {
            return true;
        } else {
            return false;
        }
    }
    /*
     * get logged in User data
     */
    public function getUserData()
    {
        $userdata = array();
        $userdata['user_id'] = $_SESSION['user_id'];
        $userdata['user_name'] = $_SESSION['user_name'];
        $userdata['is_admin'] = $_SESSION['admin'];
    }

    public function getAuthorInfo($un)
    {
        $user_n = $un;
        $this->db->query("SELECT * FROM author WHERE user_name=:user_name");
        $this->db->bind('user_name', $user_n);

        $result = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function blogPost($title, $body, $id)
    {
        $t = $title;
        $b = $body;
        $i = (int)$id;

        $this->db->query("INSERT INTO post (title, body,poster_id) 
                        VALUES (:title, :body, :poster_id)");
        $this->db->bind('title', $title);
        $this->db->bind('body', $body);
        $this->db->bind('poster_id', $i);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBlogPost($un)
    {
        $u = $un;
        $this->db->query("SELECT * FROM  post WHERE poster_id=:un ORDER BY created DESC");
        $this->db->bind("un", $u);
        $result = $this->db->resultset();

        if ($this->db->rowCount() > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function Reacted($r, $id)
    {
        if ($r == 'y') {
            $this->db->query("UPDATE post SET yes = yes + :y WHERE id=:id");
            $this->db->bind("y", $r);
            $this->db->bind("id", $id);
            $result = $this->db->execute();

            if ($this->db->execute()) {
                $this->db->query("SELECT yes from post WHERE id=:id");
                $this->db->bind("id", $id);

                return ($this->db->resultset());
            } else {
                return false;
            }
        }
    }
}
