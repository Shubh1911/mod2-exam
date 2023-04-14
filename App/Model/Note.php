<?php 
namespace App\Model;
use App\Libraries\Database;
class Note{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
public function main()
{
    require_once APPROOT . "/View/Home.php";
}
public function save($data)
{
    $id = $_SESSION['user'];
    $title = $data['title'];
    $body = $data['body'];

    $query = "INSERT INTO `data` (user_id,title,body) VALUES ('$id','$title','$body')";
    $result = $this->db->execute($query);

}
}