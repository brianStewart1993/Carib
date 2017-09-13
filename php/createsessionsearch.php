<?php
ob_start();
 session_start();
header('Access-Control-Allow-Origin: *');
if(isset($_POST['country']) && isset($_POST['category']) && isset($_POST['parish']) && isset($_POST['searchTextField']) )
{
	$country = $_POST['country'];
	$parish = $_POST['parish'];
	$category = $_POST['category'];
	$searchTextField = $_POST['searchTextField'];
	$_SESSION['countrySelected'] = $country;
	$_SESSION['parishSelected'] = $parish;
	$_SESSION['categorySelected'] = $category;
	$_SESSION['searchTextFieldSelected'] = $searchTextField;
	if(isset($_SESSION['countrySelected']) && isset($_SESSION['categorySelected']) && isset($_SESSION['parishSelected']) && isset($_SESSION['searchTextFieldSelected']) )
	{
    echo "session Created"; header("Location: ../listings-half-screen-map-grid-2.html");
	}
else echo "error";	
}
?>