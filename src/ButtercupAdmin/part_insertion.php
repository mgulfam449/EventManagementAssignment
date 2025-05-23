<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('connection.php');  // Make sure $conn is defined

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize inputs (simple trimming)
    $name = trim($_POST['name'] ?? '');
    $phone_no = trim($_POST['phone_no'] ?? '');
    $venu_type = trim($_POST['venu_type'] ?? '');
    $meal_type = trim($_POST['meal_type'] ?? '');
    $select_deco = trim($_POST['select_deco'] ?? '');
    $people_no = intval($_POST['people_no'] ?? 0);
    $meal_pkg = trim($_POST['meal_pkg'] ?? '');
    $time = trim($_POST['time'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $status = 'pending';
    $username = $_SESSION['username'] ?? 'unknown';

    // Validate required fields
    if (!$name || !$phone_no || !$venu_type || !$meal_type || !$select_deco || $people_no <= 0 || !$meal_pkg || !$time || !$date) {
        echo json_encode(['status' => 'error', 'message' => 'Please fill all required fields']);
        exit();
    }

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO party_type (name, phone_no, venu_type, meal_type, select_deco, people_no, meal_pkg, time, date, status, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssisssss", $name, $phone_no, $venu_type, $meal_type, $select_deco, $people_no, $meal_pkg, $time, $date, $status, $username);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Record added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database insert failed']);
    }

    $stmt->close();
    $conn->close();
    exit();
}

echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
exit();
