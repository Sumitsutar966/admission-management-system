<?php
$conn = new mysqli('localhost', 'root', '', 'registration');
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
?>
