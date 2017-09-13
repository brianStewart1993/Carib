<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST'); 
session_start();
if(isset($_SESSION['ResourceidSelected']))
{
    $id = $_SESSION['ResourceidSelected'];
}
$conn = mysqli_connect("localhost", "hbritton_test", "matrix1993", "hbritton_carib");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM service_finder_providers where id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	//echo mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		//echo "successfully logged in";
		
		$rows[] = $row;
		
		
    }
	echo json_encode(array_values($rows));
} else {
    echo "Error Occurred";
}

mysqli_close($conn);

?>