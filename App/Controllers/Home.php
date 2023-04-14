<?php 
namespace App\Controllers;
use App\Model\User as user_model;
class Home{
        private $user_model;
    public function __construct()
    {
        $this->user_model = new user_model();
    }
    public function home(){
        echo "home";
    }
    public function register(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "email" => $_POST["email"],
                "password" => $_POST["password"],
                "name" => $_POST["name"],
            ];
            $result = $this->user_model->register($data);
        header("Location:/home/login");
        exit();
        }
        else{
            
            require_once APPROOT . "/View/register.php";   
        }
    }
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = [
                "email" => $_POST["email"],
                "password" => $_POST["password"],
            ];
                $result = $this->user_model->login($data);
                
                if($result)
                {
                    echo "login-successfully";
                }
                else{
                    echo "invalid user or password";
                }
                }
          
         else {
            require_once APPROOT . "/View/Login.php";
        }
    }
}

?>