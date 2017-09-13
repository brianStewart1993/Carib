<?php
 session_start();
header('Access-Control-Allow-Origin: *');

if(isset($_POST['Resourceid']))
{
	$Resourceid = $_POST['Resourceid'];
	$_SESSION['ResourceidSelected'] = $Resourceid;
	if(isset($_SESSION['ResourceidSelected']))
    echo "session Created";
else echo "error";
	//header("Location: ../listings-half-screen-map-grid-2.html");
}
?>