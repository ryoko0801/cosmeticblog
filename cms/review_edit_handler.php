<?php session_start(); ?>
<?php //if the username is wrong od logoutbutton has pressed, kill the session
include("logout_handler.php");
include("partial/cmsheader.php");
?>
<?php


if(isset($_POST['updateSubmit'])) {


 	//connect to the datbase
	$conn = database_conn();
	//call the function to insert the thumbnail image
	uploadImages("../images/thumb/");

	$id = $_POST['id'];
	$subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$contents = mysqli_real_escape_string($conn, $_POST['contents']);
	$image =mysqli_real_escape_string($conn, $_FILES['image']['name']);
	$tag = mysqli_real_escape_string($conn,$_POST['tag']);
	//$category = mysqli_real_escape_string($conn, $_POST['category']);
	$date =  date("Y-m-d H:i:s");	

	$updateQuery = "UPDATE review_table
	SET posted_date = '$date', title = '$title', contents = '$contents', subcategory = '$subcategory', tag = '$tag', image = '$image'
	WHERE id = '$id'";

	$queryResult = mysqli_query($conn, $updateQuery);

	if($queryResult == false){
		echo $conn->error;
		exit; }

		//echo "<script> location.replace('reviewpage_list.php'); </script>";
	}/*end of update*/

	mysqli_close($conn);

	?>


	<?php include("partial/cmsfooter.php");?>
















