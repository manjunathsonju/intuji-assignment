<?php
include "config.php";
if (isset($_FILES['fileToUpload'])) {
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.', $file_name));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time() . "-" . basename($file_name);
    $target = "upload/" . $new_name;

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target);
    } else {
        print_r($errors);
        die();
    }
}


$title = mysqli_real_escape_string($conn, $_POST['event_title']);
$description = mysqli_real_escape_string($conn, $_POST['eventdesc']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$time_from = mysqli_real_escape_string($conn, $_POST['time_from']);
$time_to = mysqli_real_escape_string($conn, $_POST['time_to']);

$date = date("Y-m-d");
$author = $_SESSION['user_id'];

$sql = "INSERT INTO event(title, description,event_date,author,location,time_from,time_to,event_img)
          VALUES('{$title}','{$description}','{$date}',{$author},'{$location}','{$time_from}','{$time_to}','{$new_name}');";

if (mysqli_multi_query($conn, $sql)) {

    $event_id = $conn->insert_id;
    $_SESSION['last_event_id'] = $event_id;

    header("Location: $googleOauthURL");
    exit();

    // header("location: {$hostname}/admin/event.php");
} else {
    echo "<div class='alert alert-danger'>Query Failed.</div>";
}
