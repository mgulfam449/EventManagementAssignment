<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    echo "error";
    exit();
}

$conn = new mysqli('db', 'eventuser', 'eventpass', 'eventdb');
if ($conn->connect_error) {
    echo "error";
    exit();
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$cname = $_POST['cname'] ?? '';
$phoneno = $_POST['phoneno'] ?? '';
$venu_type = $_POST['venu_type'] ?? '';
$meal_type = $_POST['meal_type'] ?? '';
$stage_deco = $_POST['stage_deco'] ?? '';
$no_ppl = isset($_POST['no_ppl']) ? intval($_POST['no_ppl']) : 0;
$meal_pkg = $_POST['meal_pkg'] ?? '';
$date = $_POST['date'] ?? '';

if ($id > 0) {
    $stmt = $conn->prepare("UPDATE cop_event SET cname=?, phoneno=?, venu_type=?, meal_type=?, stage_deco=?, no_ppl=?, meal_pkg=?, date=? WHERE id=?");
    $stmt->bind_param("sssssisii", $cname, $phoneno, $venu_type, $meal_type, $stage_deco, $no_ppl, $meal_pkg, $date, $id);
    
    if ($stmt->execute()) {
        echo "success|$id";
    } else {
        echo "error";
    }
    $stmt->close();
} else {
    echo "error";
}

$conn->close();
