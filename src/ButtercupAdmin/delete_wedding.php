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

$stmt = $conn->prepare("DELETE FROM wedding_event WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
