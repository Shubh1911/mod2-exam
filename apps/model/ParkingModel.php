<?php
class ParkingLotModel {
   
function get_all_slots()
{
    include 'db.php';
// Get current date
$current_date = date("Y-m-d");

// Query to get all tickets booked for current day
$sql = "SELECT * FROM vehicles WHERE DATE(time_of_entry) = '$current_date'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display the table header
    echo "<table>
            <tr>
                <th>Slot number</th>
                <th>Vehicle number</th>
                <th>Time of entry</th>
                <th>Time of exit</th>
                <th>Status</th>
            </tr>";

    // Display the rows of data
    while ($row = mysqli_fetch_assoc($result)) {
        $slot_number = $row["slot_number"];
        $vehicle_number = $row["vehicle_number"];
        $time_of_entry = $row["time_of_entry"];
        $time_of_exit = $row["time_of_exit"];
        $status = $row["status"];

        echo "<tr>
                <td>$slot_number</td>
                <td>$vehicle_number</td>
                <td>$time_of_entry</td>
                <td>$time_of_exit</td>
                <td>$status</td>
            </tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "No tickets booked for today.";
}

// Close database connection
mysqli_close($conn);

}


function generate_ticket( $vehicle_number,$vehicle_type )
{
    include 'db.php';
    $entry_time = date("Y-m-d H:i:s");
    $exit_time = date("Y-m-d H:i:s", strtotime($entry_time . " + 2 hours"));

    // Get the next available slot for the vehicle type
    $sql = "SELECT slot_number FROM vehicles WHERE type = '$vehicle_type' AND status = 'available' ORDER BY slot_number ASC LIMIT 1";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $slot_number = $row["slot_number"];

        // Insert the ticket details into the database
        $sql = "INSERT INTO vehicles (number,type, slot_number, entry_time, exit_time, status) VALUES ('$vehicle_number', '$vehicle_type', '$slot_number', '$entry_time', '$exit_time', 'booked')";
        mysqli_query($connect, $sql);

        // Redirect to the tickets page to show the updated list of tickets
        header("Location:../index.php");
    } else {
        // No available slots for the vehicle type
        echo "Sorry, all slots for $vehicle_type are currently booked.";
    }

}
function available_slots()
{
    include 'db.php';
    
$sql = "SELECT type, COUNT(*) AS count FROM vehicles WHERE status = 'booked' GROUP BY type";
$result = mysqli_query($conn, $sql);

$slots = [
    "2-wheeler" => 100,
    "4-wheeler" => 100,
];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $slots[$row["type"]] = 100 - $row["count"];
    }
}

mysqli_close($connect);
}
function release_slot($vehicle_number)
{
    include 'db.php';
    $conn = mysqli_connect("localhost", "shubham", "Shubham@1911", "parkinglot");
    $sql = "SELECT * FROM vehicles WHERE number='$vehicle_number'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $entry_time = strtotime($row["time_of_entry"]);
        $current_time = time();

        if ($current_time - $entry_time > 7200) {
            // Vehicle has exceeded the maximum parking time
            $sql = "DELETE FROM vehicles WHERE number='$vehicle_number'";
            mysqli_query($connect, $sql);
            echo "Slot released successfully";
        } else {
            // Vehicle has not exceeded the maximum parking time
            $sql = "UPDATE vehicles SET number='',type='', time_of_entry='',time_of_exit='' WHERE number='$vehicle_number'";
            mysqli_query($connect, $sql);
            echo "Slot released successfully";
        }
    } else {
        echo "No vehicle found with the given vehicle number";
    }

}
}
?>
