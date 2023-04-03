<?php
include '../model/ParkingModel.php';

$obj=new ParkingLotModel();
if (isset($_POST["generate_ticket"])) {
    $vehicle_number = $_POST["vehicle_number"];
$obj->release_slot( $vehicle_number);
}
?>