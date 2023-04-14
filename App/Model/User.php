<?php 
namespace App\Model;
use App\Libraries\Database;
class User{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function login($data)
    {
        // destructure email and password
        $email = $data["email"];
        $password = $data["password"];
        $query = "SELECT `id` from register where email = '$email' and password = '$password'";
        $result = $this ->db ->execute($query);
        if ($result->num_rows) {
            return $result->fetch_assoc();
        }
        return false;
    }
    public function register($data)
    {
        // destructure email and password
        $name = $data["name"];
        $email = $data["email"];
        $password = $data["password"];

        // create insert query
        $query = "INSERT INTO register (name,email,password)
        VALUES ('$name','$email', '$password')";
        $result = $this->db->execute($query);
        // returns result
        return $result;
    }
    public function userExist($email)
    {
        $query = "SELECT email from user where email = '$email'";
        //executes query
        $result = $this
            ->db
            ->execute($query);
        if ($result->num_rows) {
            return true;
        }
        return false;
    }
}