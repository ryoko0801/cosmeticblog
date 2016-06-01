<?php include("partials/function.php");

if(isset($_POST['comments']) AND $_POST['comments'] !== ""){
	//connect to the database
	$conn = database_conn();
	if(!$conn){
		echo"Connection Failed";
	}else{
		$id = $_POST["blog_id"];
		$category = $_POST["category"];
		$cm = $_POST["comments"];
		$un = $_POST["username"];
		$ti = $_POST["title"];

		$comment = mysqli_real_escape_string($conn, $cm);
		$blog_id =  mysqli_real_escape_string($conn, $id);
		$username =  mysqli_real_escape_string($conn, $un);
		$title =  mysqli_real_escape_string($conn, $ti);
		$date =  date("Y-m-d-G-i");

		if($category == "reviews"){
			$sqlQuery = "INSERT INTO review_comment( title, date_posted, comments, username, blog_id)
			VALUES( '$title', '$date','$comment', '$username', '$blog_id')";
		}else if($category == "trend"){
			$sqlQuery = "INSERT INTO trend_comment( title, date_posted, comments, username, blog_id)
			VALUES( '$title', '$date','$comment', '$username', '$blog_id')";
		}
		//insert the data to database
		$resultInsert = mysqli_query($conn, $sqlQuery);
		if($resultInsert == false){
		echo "Sorrry! There is a error with the post a comment, Try again. <a href='post.php?category=".$category."&id=".$id."'> </a>";
			exit;
		}

		else{
		echo "<script> location.replace('post.php?category=".$category."&id=".$id."') </script>";
		}
	}//end of else statement
}//end of if statement	
//close the connection
mysqli_close($conn);

//var_dump($_POST);