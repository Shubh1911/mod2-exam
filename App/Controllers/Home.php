<?php
namespace App\Controllers;
use App\Model\Home as user_model;
use Core\View;
class Home
{
    private $db;
    public function __construct()
    {
        $this->db=new user_model();
    }
    public function home()
    {
        require_once APPROOT . "/View/Home.php"; 
    }
    public function genrateTicket()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $data = [
               "vehicle_number" => $_POST["vehicle_number"],
               "vehicle_type" => $_POST["vehicle_type"],
           ];
           $res=$this->db->availabeSlots();
           $this->db->genrateTicket($data,$res);    

    }
    else{
        require_once APPROOT . "/View/Home.php";   
    }
}
public function availableSlot()
{
    
   $res=100-$this->db->availabeSlots()+1;  
   echo "$res";
}

public function release()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vehicleNumber=$_POST['vehicle_number'];
       $this->db->release($vehicleNumber);  

 }
 else{
     require_once APPROOT . "/View/Home.php";   
 }

}
public function display()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $this->db->display();
    print_r($data);
    require_once APPROOT . "/View/Feed.php";
}
else{
    require_once APPROOT . "/View/Home.php";    
}
}


}
?>