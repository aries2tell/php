<?php
require 'constants.php';

// Create a new MySQLi instance
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die('Database error: ' . $conn->connect_error);
}
