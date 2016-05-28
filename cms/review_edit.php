<?php session_start(); ?>
<?php //if the username is wrong od logoutbutton has pressed, kill the session
include("logout_handler.php");
include("partial/cmsheader.php");
?>
<?php
$category= $_POST["category"];
//connect to the datbase
$conn = database_conn();
//if the delete btn has been pressed
if (isset($_POST['edit']['delete'])) {
 //delete from database
	$upload = false;
	$deleteImagePath = "../images/thumb/".$_POST['imagename'];
	var_dump($deleteImagePath);
	unlink($deleteImagePath);
	if($_POST["category"] == "reviews"){
		$deleteQuery = "DELETE FROM review_table WHERE id=$_POST[id]";
	}else if($_POST["category"] == "trend"){
		$deleteQuery = "DELETE FROM trend_table WHERE id=$_POST[id]";
	}
	//query to delete the data from database
	$deleteResult = mysqli_query($conn, $deleteQuery);
	if($deleteResult == false){
		echo $conn->error;
		exit; }
		//go back to the list of the post
		echo "<script> location.replace('reviewpage_list.php?category=".$category."'); </script>";
	} elseif (isset($_POST['edit']['update'])) {
		$subcategoryOption="";
		$upload = true;
		if($_POST["category"] == "reviews"){
		//to change the subcategory
			$subcategoryOption .="<select name='subcategory' required>
			<option value='eyemakeup'>Eye Makeup</option>
			<option value='basemakeup'>Base Makeup</option>
			<option value='skincare'>Skin care</option>
			<option value='perfume'>Perfume</option>
			<option value='makeuptool'>Makeup tools</option>
		</select>" ;
		$query = "SELECT * FROM review_table WHERE id=$_POST[id]";
	}else if($_POST["category"] == "trend"){
		//to change the subcategory
		$subcategoryOption .="<select name='subcategory' required>
		<option value='hairstyle'>Hair style</option>
		<option value='makeup'>Trend Makeup</option>
		<option value='nail'>Nail art</option>
		<option value='fasion'>Fasion</option>
	</select>" ;
	$query = "SELECT * FROM trend_table WHERE id=$_POST[id]";
}
//sql to grub the data from database
$queryResult = mysqli_query($conn, $query);

if($queryResult == false){
	echo $conn->error;
	exit; }

	while($row = mysqli_fetch_assoc($queryResult)){
		$id = $row["id"];
		$subcategory = $row["subcategory"];
		$title = $row["title"];
		$date = $row["posted_date"];
		$contents = $row["contents"];
		$image = $row["image"];
		$tag = $row["tag"];
		$category = $row["category"];			
	}/*end of while*/
}/*end of update*/
?>
<div class="row margin-top-cms">
	<!-- include the menu -->
	<?php include("partial/cmsmenu.php");?>
	<div class="large-9 columns">
		<h2>Update the Post</h2>
		<p>You can <em>update</em> previous post from this page.<br>If you want to update previous posts, just edif from here.</p>
		<div class="mar-top">
			<form action="review_edit_handler.php" method="post" enctype="multipart/form-data">
				<label>Title of the post
					<input type="text" name="title" value="<?php  echo $title;?>">
				</label><br>
				<label>Sub category
					<label>Sub category
						<?php echo $subcategoryOption;?>
					</label><br>
				</label><br>
				<textarea id="editor1" name="contents" rows="10" cols="80" class="ckeditor"><?php echo $contents;?> </textarea><br>
				<label>Tags
					<input type="text" name="tag" value="<?php echo $tag; ?>"/>
				</label><br>
				<label>Sumbnail Image (small image)
					<input type="file" name="image" value="<?php echo $upload;?>"/>
				</label>
				<span>Curent Image<img src="../images/thumb/<?php echo $image;?>"/></span><br>
				<!-- hidden POST values -->
				<input type="hidden" name="current" value="<?php echo $image;?>" />
				<input type="hidden" name="id" value="<?php echo $id;?>" />
				<input type="hidden" name="category" value="<?php echo $category;?>" />
				<!-- submit  -->
				<input name="updateSubmit" type="submit" value="Submit the Change">
			</form>
			<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
			<script> 
				$(function(){
					CKEDITOR.replace( 'editor1'); 
				});
			</script>
		</div>
	</div><!-- end of columns -->
</div><!-- end of row -->
<?php include("partial/cmsfooter.php");
