<?php
$conn = mysqli_connect("localhost", "shubham", "Shubham@1911", "parkinglot");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get current date
$current_date = date("Y-m-d");

// Query to get all tickets booked for current day
$sql = "SELECT * FROM vehicles WHERE DATE(time_of_entry) = '$current_date'";

$result = mysqli_query($conn, $sql);

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

?>
