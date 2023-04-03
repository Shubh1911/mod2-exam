<?php
include '../model/ParkingModel.php';

$obj=new ParkingLotModel();
$obj->get_all_slots();
?>