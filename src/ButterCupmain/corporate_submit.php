<?php
session_start();
include('connection.php');

if (isset($_POST['insert'])) {
    $cname = $_POST['cname'];
    $phoneno = $_POST['phoneno'];
    $venu_type = $_POST['venu_type'];
    $meal_type = $_POST['meal_type'];
    $stage_deco = $_POST['stage_deco'];
    $no_ppl = $_POST['no_ppl'];
    $meal_pkg = $_POST['meal_pkg'];
    $date = $_POST['date'];
    $status = 'pending';
    $username = $_SESSION['username'];

    $op = "INSERT INTO cop_event (cname, phoneno, venu_type, meal_type, stage_deco, no_ppl, meal_pkg, date, status, username)
           VALUES ('$cname', '$phoneno', '$venu_type', '$meal_type', '$stage_deco', '$no_ppl', '$meal_pkg', '$date', '$status', '$username')";

    mysqli_query($conn, $op);
    header("Location: index.php?submitted=corporate");
    exit();
}
?>
