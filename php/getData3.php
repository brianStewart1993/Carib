<?php
ob_start();
session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST'); 
if(isset($_SESSION['ResourceidSelected']))
{
    $id = $_SESSION['ResourceidSelected'];
}

$connection = mysqli_connect("localhost", "hbritton_test", "matrix1993", "hbritton_carib"); // Establishing Connection with Server..
 // Selecting Database
  $sql = "SELECT * FROM service_finder_providers where id ='$id'";
$result = mysqli_query($connection, $sql) or die(mysqli_error());
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$booking_description = $row['booking_description'];
	}
	echo "<p>".$booking_description."</p>";
	 }
	 else
	 {
	 }

mysqli_close($connection); // Connection Closed

?>