<?php
$conn = new mysqli('localhost', 'root', '', 'a_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
