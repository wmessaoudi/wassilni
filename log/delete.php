<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wassilni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM covoiturage where id='$id'";
$conn->query($sql);

$conn->close();

header( "refresh:0;url=profile.php" );


?>









