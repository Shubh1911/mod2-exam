<?php 
namespace App\Model;
use App\Libraries\Database as data;
class Home{
    private $db;
    public function __construct(){
        $this->db=new data();
    }

    public function genrateTicket($data,$res)
    {
    $i=$res;
         $vehicleNumber =$data['vehicle_number'];
          $vehicleType = $data['vehicle_type'];
         $timeOfEntry = date('Y-m-d H:i:s');
          $query = "INSERT INTO parking_lot (slot_number, vehicle_number, vehicle_type, time_of_entry) 
                      VALUES ('$i', '$vehicleNumber', '$vehicleType', '$timeOfEntry')";
            // Execute the query here
            $this->db->execute($query);

    }
    public function availabeSlots()
    {
        $query = "select * from parking_lot";
        $result=$this->db->execute($query);
         $res=mysqli_num_rows($result);
         return $res+1;  
}
public function release($vehicleNumber)
{
    $query = "DELETE FROM parking_lot WHERE vehicle_number='$vehicleNumber'";
        $this->db->execute($query);
}
public function display()
{
    $query = "select * from parking_lot";
    $result=$this->db->execute($query);

    $data = [];
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $data[$i]['slot_number'] = $row['slot_number'];
        $data[$i]['vehicle_number'] = $row['vehicle_number'];
        $data[$i]['time_of_entry'] = $row['time_of_entry'];
      
        $i++;
    }
    return $data;
}
}
?>