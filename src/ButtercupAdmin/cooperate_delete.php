<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    echo "error";
    exit();
}

if (!isset($_POST['id'])) {
    echo "error";
    exit();
}

$conn = new mysqli('db', 'eventuser', 'eventpass', 'eventdb');
if ($conn->connect_error) {
    echo "error";
    exit();
}

$id = intval($_POST['id']);
$sql = "DELETE FROM cop_event WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
