<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('connection.php');

if(isset($_POST['done'])){
    $name = $_POST['name'];
    $phone_no = $_POST['phone_no'];
    $venu_type = $_POST['venu_type'];
    $meal_type = $_POST['meal_type'];
    $stage_deco = $_POST['select_deco'];
    $people_no = $_POST['people_no'];
    $meal_pkg = $_POST['meal_pkg'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $status = 'pending';
    $username = $_SESSION['username'];

    $p = "INSERT INTO party_type (name, phone_no, venu_type, meal_type, select_deco, people_no, meal_pkg, time, date, status, username)
          VALUES ('$name', '$phone_no', '$venu_type', '$meal_type', '$stage_deco', '$people_no', '$meal_pkg', '$time', '$date', '$status', '$username')";
    
    mysqli_query($conn, $p);
    header("Location: index.php?submitted=party");
    exit();
}
?>
