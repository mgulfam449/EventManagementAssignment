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

$cname = $_POST['cname'] ?? '';
$phoneno = $_POST['phoneno'] ?? '';
$venu_type = $_POST['venu_type'] ?? '';
$meal_type = $_POST['meal_type'] ?? '';
$stage_deco = $_POST['stage_deco'] ?? '';
$no_ppl = intval($_POST['no_ppl'] ?? 0);
$meal_pkg = $_POST['meal_pkg'] ?? '';
$date = $_POST['date'] ?? '';
$status = 'pending';
$username = $_SESSION['admin_username'];

$stmt = $conn->prepare("INSERT INTO cop_event (cname, phoneno, venu_type, meal_type, stage_deco, no_ppl, meal_pkg, date, status, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssissss", $cname, $phoneno, $venu_type, $meal_type, $stage_deco, $no_ppl, $meal_pkg, $date, $status, $username);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
