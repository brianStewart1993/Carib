<?php
ob_start();
session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST'); 
if (isset($_POST['name'])){ $name = $_POST['name']; }
if (isset($_POST['email'])){ $email = $_POST['email']; }
if (isset($_POST['review'])){ $review = $_POST['review']; }
//if (isset($_POST['rating-1'])) { $rating = 1; }
//if (isset($_POST['rating-2'])) { $rating = 2; }
//if (isset($_POST['rating-3'])) { $rating = 3; }
//if (isset($_POST['rating-4'])) { $rating = 4; }
//if (isset($_POST['rating-5'])) { $rating = 5; }
if (isset($_POST['rating'])) { $rating = $_POST['rating']; }
if(isset($_SESSION['ResourceidSelected']))
{
    $ResourceId = $_SESSION['ResourceidSelected'];
}

$connection = mysqli_connect("localhost", "hbritton_test", "matrix1993", "hbritton_carib"); // Establishing Connection with Server..
 // Selecting Database

$query = "insert into carib_reviews(Name, Rating, Review, Email, ResourceId) values ('$name', '$rating', '$review', '$email', '$ResourceId')";

 //Insert Query
 
if( $connection->query($query) == true)
{
echo "Review Successfully Added";
}
else echo "error";

mysqli_close($connection); // Connection Closed


?>