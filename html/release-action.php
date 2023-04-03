<?php
    $conn = mysqli_connect("localhost", "shubham", "Shubham@1911", "parkinglot");
    $vehicle_number = $_POST["vehicle_number"];

    $sql = "SELECT * FROM vehicles WHERE number='$vehicle_number'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $entry_time = strtotime($row["time_of_entry"]);
        $current_time = time();

        if ($current_time - $entry_time > 7200) {
            // Vehicle has exceeded the maximum parking time
            $sql = "DELETE FROM vehicles WHERE number='$vehicle_number'";
            mysqli_query($conn, $sql);
            echo "Slot released successfully";
        } else {
            // Vehicle has not exceeded the maximum parking time
            $sql = "UPDATE vehicles SET number='',type='', time_of_entry='',time_of_exit='' WHERE number='$vehicle_number'";
            mysqli_query($conn, $sql);
            echo "Slot released successfully";
        }
    } else {
        echo "No vehicle found with the given vehicle number";
    }
?>
