<?php
$conn = mysqli_connect("localhost", "shubham", "Shubham@1911", "parkinglot");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql =
    "SELECT type, COUNT(*) AS count FROM vehicles WHERE status = 'booked' GROUP BY type";
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

mysqli_close($conn);
?>

<div id="availability">
  <h2>Availability</h2>
  <p>2-wheeler slots available: <?php echo $slots["2-wheeler"]; ?></p>
  <p>4-wheeler slots available: <?php echo $slots["4-wheeler"]; ?></p>
</div>
