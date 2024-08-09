<?php
include "config.php";

$event_id = $_GET['id'];


$sql1 = "SELECT * FROM event WHERE event_id = {$event_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/" . $row['event_img']);

$sql = "DELETE FROM event WHERE event_id = {$event_id};";


if (mysqli_multi_query($conn, $sql)) {
    header("location: {$hostname}/admin/event.php");
} else {
    echo "Query Failed";
}
