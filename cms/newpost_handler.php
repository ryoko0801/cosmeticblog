<?php session_start(); ?>
<?php //if the username is wrong od logoutbutton has pressed, kill the session
include("logout_handler.php");
include("partial/cmsheader.php");
?>
<?php 
if(isset($_POST["submit"])){
	$conn = database_conn();
	//call the function to insert the thumbnail image
	uploadImages("../images/thumb/");
		//echo"HEllo";
	var_dump($_POST);
	var_dump($_FILES['image']);
	$subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$contents = mysqli_real_escape_string($conn, $_POST['contents']);
	$image =mysqli_real_escape_string($conn,$_FILES['image']['name']);
	$tag = mysqli_real_escape_string($conn,$_POST['tag']);
	$category = mysqli_real_escape_string($conn, $_POST['category']);
	$date =  date("Y-m-d H:i:s");
	var_dump($category);

	if($_POST["category"] == "reviews"){
		$sqlQuery = "INSERT INTO review_table(image, title, contents, subcategory, posted_date, tag, category)
		VALUES('$image', '$title', '$contents', '$subcategory', '$date','$tag', '$category')";
	}else if($_POST["category"] == "trend"){
		$sqlQuery = "INSERT INTO trend_table(image, title, contents, subcategory, posted_date, tag, category)
		VALUES('$image', '$title', '$contents', '$subcategory', '$date','$tag', '$category')";
	}
//insert the data to database
	$resultInsert = mysqli_query($conn, $sqlQuery);
	if($resultInsert == false){
		echo $conn->error;
		echo "Sorrry! There is a error with the post a New blog, Try again. <a href='newpost.php?category=".$category."'> </a>";
		exit;
	}
	else{
		echo "<script> location.replace('reviewpage_list.php?category=".$category."'); </script>";
	}
}
//close the connection
mysqli_close($conn);