<?php
session_start();
include('connection.php');

if (isset($_POST['done'])) {
    // Escape and fetch all fields
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
    $venu_type = mysqli_real_escape_string($conn, $_POST['venu_type']);
    $meal_type = mysqli_real_escape_string($conn, $_POST['meal_type']);
    $stage_deco = mysqli_real_escape_string($conn, $_POST['select_deco']);
    $people_no = (int) $_POST['people_no']; // cast to int
    $meal_pkg = mysqli_real_escape_string($conn, $_POST['meal_pkg']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    $status = 'pending';
    $username = $_SESSION['username'];

    // SQL query
    $p = "INSERT INTO party_type (name, phone_no, venu_type, meal_type, select_deco, people_no, meal_pkg, time, date, status, username)
          VALUES ('$name', '$phone_no', '$venu_type', '$meal_type', '$stage_deco', '$people_no', '$meal_pkg', '$time', '$date', '$status', '$username')";

    mysqli_query($conn, $p);
    header("Location: index.php?submitted=party");
    exit();
}
?>
