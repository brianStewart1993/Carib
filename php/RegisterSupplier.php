<?php
ob_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST'); 
define('SALT', 'wwhateveryouwant');
if (isset($_POST['supplier_name'])){ $suppliername = $_POST['supplier_name']; }
if (!isset($_POST['supplier_name'])){ $suppliername = null; }
if (isset($_POST['fname'])){ $fname = $_POST['fname']; }
if (isset($_POST['lname'])){ $lname = $_POST['lname']; }
if (isset($_POST['username'])) { $username = $_POST['username']; }
if (isset($_POST['email'])) { $email = $_POST['email']; }
if (isset($_POST['pwd'])) { $Pwd = $_POST['pwd']; }
if (isset($_POST['pwdrepeat'])) { $Pwdrepeat = $_POST['pwdrepeat']; }
if (isset($_POST['phone'])) { $phone = $_POST['phone']; }
if (isset($_POST['category'])) { $category = $_POST['category']; }
if (isset($_POST['trade'])) { $trade = $_POST['trade']; }
if (isset($_POST['parish'])) { $parish = $_POST['parish']; }
if (isset($_POST['searchTextField'])) { $address = $_POST['searchTextField']; }
if (isset($_POST['addr2'])) { $addr2 = $_POST['addr2']; }
if (isset($_POST['addr3'])) { $addr3 = $_POST['addr3']; }
if (isset($_POST['website'])) { $website = $_POST['website']; }
if (!isset($_POST['website'])) { $website = null; }
if (isset($_POST['Tparish'])) { $Tparish = $_POST['Tparish']; }
if (isset($_POST['TCCountry'])) { $TCCountry = $_POST['TCCountry']; }
if (isset($_POST['WCCountry'])) { $WCCountry = $_POST['WCCountry']; }
if (isset($_POST['summary'])) { $summary = $_POST['summary']; }
if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 5242880)
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("supplier/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " already exists ";
}
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "supplier/".$_FILES['file']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo "Image Uploaded Successfully...!!";
//echo "File Name: " . $_FILES["file"]["name"];
//echo "Type: " . $_FILES["file"]["type"];
//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB";
$connection = mysqli_connect("localhost", "hbritton_test", "matrix1993", "hbritton_carib"); // Establishing Connection with Server..
 // Selecting Database
$acpwd = encrypt($Pwd);
$query = "insert into carib_users(user_login, user_pass, user_nicename, user_email, display_name) values ('$username', '$acpwd', '$username', '$email', '$username')";
 //Insert Query
 
  $sql = "SELECT * FROM carib_users where user_login ='$username'";
$result = mysqli_query($connection, $sql) or die(mysqli_error());
if (mysqli_num_rows($result) > 0) {
	echo "Username Unavailable";
}
else
{ 
if( $connection->query($query) == true)
{
echo "Sign up Successful";
$sql2 = "SELECT Count(*) as total FROM carib_users";
$result2 = mysqli_query($connection, $sql2);

$data=mysqli_fetch_assoc($result2);

$num = $data['total'];
$query2 = "insert into service_finder_suppliers(wp_user_id, admin_moderation, identity, company_name, email, phone, address, booking_description, parish, picurl, supplier_name, trade, travel_parish, travel_CCountry, willing_CCountry, category, website, first_name, last_name) values ('$num','approved', 'approved', '$suppliername', '$email', '$phone', '$address', '$summary', '$parish', '$targetPath', '$suppliername', '$trade', '$Tparish', '$TCCountry', '$WCCountry', '$category', '$website', '$fname', '$lname')";

if( $connection->query($query2) == true)
{
	echo "Customer Info Saved";
	header("Location: ../index.html");
}
}
else echo "error";
}
mysqli_close($connection); // Connection Closed
}
}
}
}
else
{
echo "***Invalid file Size or Type***";
}
function encrypt($text) 
{ 
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
} 
?>