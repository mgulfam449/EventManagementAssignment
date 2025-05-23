<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $name = $_POST['cust_name'];
    $cust_phone = $_POST['cust_ph'];
    $venue_type = $_POST['venu_type'];
    $meal_pkg = $_POST['meal_pakg'];
    $stage_deco = $_POST['stag_decor'];
    $people_no = $_POST['pno'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $status = 'pending';
    $username = $_SESSION['username'];

    $ins = "INSERT INTO wedding_event (cust_name, cust_ph, venu_type, meal_pakg, stag_decor, pno, time, date, status, username)
            VALUES ('$name', '$cust_phone', '$venue_type', '$meal_pkg', '$stage_deco', '$people_no', '$time', '$date', '$status', '$username')";

    mysqli_query($conn, $ins);
    header("Location: index.php?submitted=wedding");
    exit();
}
?>
