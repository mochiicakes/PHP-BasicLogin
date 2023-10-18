<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa4_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE user (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  middle_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  contact_num VARCHAR(30) NOT NULL,
  email VARCHAR(30) NOT NULL,
  birthday VARCHAR(30) NOT NULL,
  username VARCHAR(30) NOT NULL,
  access_level VARCHAR(30) NOT NULL,
  status VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL
  );";

if (mysqli_query($conn, $sql)) {
  echo "Table user created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
