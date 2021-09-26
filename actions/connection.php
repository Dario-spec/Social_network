<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social_network";

// Create connection
$mysqli = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

