<?php
$conn = mysqli_connect('db', 'eventuser', 'eventpass', 'eventdb');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
