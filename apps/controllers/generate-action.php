<?php
include '../model/ParkingModel.php';

$obj=new ParkingLotModel();
if (isset($_POST["generate_ticket"])) {
    $vehicle_number = $_POST["vehicle_number"];
    $vehicle_type = $_POST["vehicle_type"];
$obj->generate_ticket( $vehicle_number, $vehicle_type);
}
?>