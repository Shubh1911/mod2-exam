<?php 
namespace App\Controllers;
use App\Model\Note as note_model;
class Note{
    private $note_model;
    public function __construct()
    {
        $this->note_model = new note_model();
    }
    public function main()
{
    require_once APPROOT . "/View/Home.php";
}
public function login(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
            
    }
}

}
?>