<?php
ob_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST'); 
define('SALT', 'wwhateveryouwant');
if (isset($_POST['username'])) { $username = $_POST['username']; }
if (isset($_POST['password'])) { $Pwd = $_POST['password']; }
$connection = mysqli_connect("localhost", "hbritton_test", "matrix1993", "hbritton_carib"); // Establishing Connection with Server..
 // Selecting Database
$acpwd = encrypt($Pwd);
  $sql = "SELECT * FROM carib_users where user_login ='$username' AND user_pass ='$acpwd'";
$result = mysqli_query($connection, $sql) or die(mysqli_error());
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$id = $row['ID'];
	}
	 $sql2 = "SELECT * FROM service_finder_customers where wp_user_id ='$id'";
     $result2 = mysqli_query($connection, $sql2) or die(mysqli_error());
	 if (mysqli_num_rows($result2) > 0) {
		 echo "you are a Client";
		// header("Location: ../index2.html");
	 }
	 else
	 {
	 $sql3 = "SELECT * FROM service_finder_providers where wp_user_id ='$id'";
     $result3 = mysqli_query($connection, $sql3) or die(mysqli_error());
	 if (mysqli_num_rows($result3) > 0) {
		 echo "you are a Resource";
		// header("Location: ../index2.html");
	 }
	 else{
	 $sql4 = "SELECT * FROM service_finder_suppliers where wp_user_id ='$id'";
     $result4 = mysqli_query($connection, $sql4) or die(mysqli_error());
	 if (mysqli_num_rows($result4) > 0) {
		 echo "you are a Supplier";
		 //header("Location: ../index2.html");
	 }
	 }
	 }
}
else
{ 
  echo "error";
}
mysqli_close($connection); // Connection Closed

function encrypt($text) 
{ 
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
} 
?>