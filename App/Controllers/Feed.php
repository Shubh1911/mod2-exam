<?php
namespace App\Controllers;
use App\Model\Home as user_model;

Class Feed{
    private $db;
    public function __construct()
    {
        $this->db=new user_model();
    }


    public function summary(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $this->db->display();
            require_once APPROOT . "/View/Feed.php";
        }
    }
}
