<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST'); 
session_start();
if(isset($_SESSION['countrySelected']) && isset($_SESSION['categorySelected']) && isset($_SESSION['parishSelected']) && isset($_SESSION['searchTextFieldSelected']) )
{
    $country =	$_SESSION['countrySelected'];
	$parish = $_SESSION['parishSelected'];
	$category = $_SESSION['categorySelected'];
	$searchTextField = $_SESSION['searchTextFieldSelected'];
}
$conn = mysqli_connect("localhost", "hbritton_test", "matrix1993", "hbritton_carib");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT Count(*) as total FROM service_finder_providers where address Like '%$searchTextField%' AND category ='$category'";
$result = mysqli_query($conn, $sql);

$data=mysqli_fetch_assoc($result);

$num = $data['total'];
echo "<center><p> <i class='sl sl-icon-magnifier'></i> See (".$num.") Search Results Below</p></center>";
mysqli_close($conn);

?>