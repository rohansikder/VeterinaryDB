<?php
// Database configuration
$host     = "localhost";
$username = "root";
$password = "";
$port     = "3306";
$database = "Veterinary";

// Create database connection
$db = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>