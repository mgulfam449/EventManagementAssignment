<?php
// Connect to Docker MySQL container with eventdb database
$conn = new mysqli('db', 'eventuser', 'eventpass', 'eventdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Prepare and bind parameters to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO wedding_event (cust_name, cust_ph, venu_type, meal_pakg, stag_decor, pno, time, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssis", $name, $cust_phone, $venue_type, $meal_pkg, $stage_deco, $people_no, $time, $date);

    // Assign POST values to variables
    $name = $_POST['cust_name'];
    $cust_phone = $_POST['cust_ph'];
    $venue_type = $_POST['venu_type'];
    $meal_pkg = $_POST['meal_pakg'];
    $stage_deco = $_POST['stag_decor'];
    $people_no = (int)$_POST['pno'];  // cast to int
    $time = $_POST['time'];
    $date = $_POST['date'];

    // Execute query and check for errors
    if ($stmt->execute()) {
        // Success — you can set a session or redirect here if needed
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
