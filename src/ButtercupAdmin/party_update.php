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

$id = intval($_POST['id'] ?? 0);
$name = $_POST['name'] ?? '';
$phone_no = $_POST['phone_no'] ?? '';
$party_type = $_POST['party_type'] ?? '';
$meal_type = $_POST['meal_type'] ?? '';
$select_deco = $_POST['select_deco'] ?? '';
$people_no = intval($_POST['people_no'] ?? 0);
$meal_pkg = $_POST['meal_pkg'] ?? '';
$time = $_POST['time'] ?? '';
$date = $_POST['date'] ?? '';

if ($id > 0) {
    $stmt = $conn->prepare("UPDATE party_type SET name=?, phone_no=?, party_type=?, meal_type=?, select_deco=?, people_no=?, meal_pkg=?, time=?, date=? WHERE id=?");
    $stmt->bind_param("sssssisssi", $name, $phone_no, $party_type, $meal_type, $select_deco, $people_no, $meal_pkg, $time, $date, $id);

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
