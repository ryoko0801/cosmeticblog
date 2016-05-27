<?php session_start(); ?>
<?php //if the username is wrong od logoutbutton has pressed, kill the session
include("logout_handler.php");
include("partial/cmsheader.php");
?>


<?php
$reviewTable = "";
	//connect to the database
$conn = database_conn();

$query = "SELECT * FROM review_table ORDER BY id DESC";
$queryResult = mysqli_query( $conn, $query );

if($queryResult == false){
	echo $conn->error;
	exit;
}

$numberOfRows = mysqli_num_rows( $queryResult );

if( $numberOfRows > 0 ){
	while($row = mysqli_fetch_assoc($queryResult)){
		$id = $row["id"];
		$subcategory = $row["subcategory"];
		$title = $row["title"];
		$date = $row["posted_date"];
		$contents = $row["contents"];
		$image = $row["image"];
		$tag = $row["tag"];
		$category = $row["category"];

		//var_dump($contents);

		$reviewTable .="<tr>
		<form action='review_edit.php' method='post'>
			<td class=''>
				<input type='text' name='id' value='$id'>
			</td>
			<td class=''>
				<img class='small' src='../images/thumb/".$image."'/>
				<input type='hidden' name='imagename' value='".$image."' />
			</td>
			<td id='content".$id."' class='js-list-text'>
				<p class='table-date'>".$date."</p>
				<h6>".$title."</h6>
				".$contents."
			</td>
			<td class='list'>".$subcategory."</td>
			<td class='list'>".$tag."</td>
			<td class=''>
				<button class='button' type='submit' name='edit[update]' value='update'>UPDATE </button><br>
				<button class='button' type='submit' name='edit[delete]' value='delete'>DELETE </button>
			</td>
		</form>
	</tr>";
}/*end of while*/
}/*end of if*/
//var_dump($reviewTable);
//kill the connection
mysqli_close($conn);
?>




<div class="row margin-top-cms">
	<!-- include the menu -->
	<?php include("partial/cmsmenu.php");?>
	<div class="large-9 columns">
		<h2>Edit <?php echo $category;?> page</h2>
		<p>You can update or deleate previous post from this page.<br>If you want to update or delete previous posts, press "DELETE" or "UPDATE" buttons beside of each post. If you want to Post new blog, select the New Post from the menu.</p>
		<div class="mar-top">
			<table>
				<thead>
					<tr><th>ID</th><th>Thumbnail</th><th>Title/Contents</th><th>subcategory</th><th>Tags</th><th>Edit</th></tr>
				</thead>
				<tbody>
					<?php echo $reviewTable ;?>
				</tbody>
			</table>
		</div>
	</div><!-- end of columns -->
</div><!-- end of row -->
<?php include("partial/cmsfooter.php");?>

