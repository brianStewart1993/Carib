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
  $sql = "SELECT * FROM carib_reviews where ResourceId='$id'";
$result = mysqli_query($connection, $sql) or die(mysqli_error());
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$name = $row['Name'];
		$review = $row['Review'];
		$rating = $row['Rating'];
		$email = $row['Email'];
		
		                  echo "<li>
							<div class='avatar'><img src='http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70' alt='' /> </div>
							<div class='comment-content'><div class='arrow-comment'></div>
								<div class='comment-by'>".$name."<span class='date'>September 2017</span>
									<div class='star-rating' data-rating='".$rating."'></div>
								</div>".
								"<p>".$review."</p>
							</div>

						</li>";
	}
	 }
	 else
	 {
	 }

mysqli_close($connection); // Connection Closed

?>