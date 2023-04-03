<?php
if (isset($_POST["generate_ticket"])) {
    $conn = mysqli_connect("localhost", "shubham", "Shubham@1911", "parkinglot");
    $vehicle_number = $_POST["vehicle_number"];
    $vehicle_type = $_POST["vehicle_type"];
    $entry_time = date("Y-m-d H:i:s");
    $exit_time = date("Y-m-d H:i:s", strtotime($entry_time . " + 2 hours"));

    // Get the next available slot for the vehicle type
    $sql = "SELECT slot_number FROM vehicles WHERE type = '$vehicle_type' AND status = 'available' ORDER BY slot_number ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $slot_number = $row["slot_number"];

        // Insert the ticket details into the database
        $sql = "INSERT INTO vehicles (number,type, slot_number, entry_time, exit_time, status) VALUES ('$vehicle_number', '$vehicle_type', '$slot_number', '$entry_time', '$exit_time', 'booked')";
        mysqli_query($conn, $sql);

        // Redirect to the tickets page to show the updated list of tickets
        header("Location:../index.php");
    } else {
        // No available slots for the vehicle type
        echo "Sorry, all slots for $vehicle_type are currently booked.";
    }
}
?>
