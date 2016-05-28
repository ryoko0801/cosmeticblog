<?php session_start(); ?>
<?php //if the username is wrong od logoutbutton has pressed, kill the session
include("logout_handler.php");
include("partial/cmsheader.php");
?>
<?php
if(isset($_POST['updateSubmit'])) {
	$category = $_POST["category"];
	//if the image wasn't set new one,use previous image as a thumbnail.
 	$newImg = $_POST['current'];
 	//connect to the datbase
	$conn = database_conn();
	//call the function to insert the thumbnail image
	uploadImages("../images/thumb/");
	//
	if( isset($_FILES['image']['name']) && empty($_FILES['image']['error'])){
		$newImg = $_FILES['image']['name'];
	}
	$id = $_POST['id'];
	$subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$contents = mysqli_real_escape_string($conn, $_POST['contents']);
	$image =mysqli_real_escape_string($conn,$newImg);
	$tag = mysqli_real_escape_string($conn,$_POST['tag']);
	//$category = mysqli_real_escape_string($conn, $_POST['category']);
	$date =  date("Y-m-d H:i:s");	

	if($_POST["category"] == "reviews"){
		$updateQuery = "UPDATE review_table
	SET posted_date = '$date', title = '$title', contents = '$contents', subcategory = '$subcategory', tag = '$tag', image = '$image'
	WHERE id = '$id'";
	}else if($_POST["category"] == "trend"){
		$updateQuery = "UPDATE trend_table
	SET posted_date = '$date', title = '$title', contents = '$contents', subcategory = '$subcategory', tag = '$tag', image = '$image'
	WHERE id = '$id'";
	}
	//send sql to database
	$queryResult = mysqli_query($conn, $updateQuery);
	if($queryResult == false){
		echo $conn->error;
		exit; }
	//back to the list of posts
	echo "<script> location.replace('reviewpage_list.php?category=".$category."'); </script>";
	}/*end of update*/
	mysqli_close($conn);
    include("partial/cmsfooter.php");
















