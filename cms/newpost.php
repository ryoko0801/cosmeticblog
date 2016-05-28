<?php session_start(); ?>
<?php //if the username is wrong od logoutbutton has pressed, kill the session
include("logout_handler.php");
include("partial/cmsheader.php");
?>
<?php 
if(isset($_GET["category"])){
	// empty var to put the option
	//subcategory option should be different from each category
	$subcategoryOption="";
	$category="";
	if($_GET["category"] == "reviews"){
			$category="reviews";
			$subcategoryOption .="<select name='subcategory' required>
					<option value='eyemakeup'>Eye Makeup</option>
					<option value='basemakeup'>Base Makeup</option>
					<option value='skincare'>Skin care</option>
					<option value='perfume'>Perfume</option>
					<option value='makeuptool'>Makeup tools</option>
				</select>" ;
		}else if($_GET["category"] == "trend"){
			$category="trend";
			$subcategoryOption .="<select name='subcategory' required>
					<option value='hairstyle'>Hair style</option>
					<option value='makeup'>Trend Makeup</option>
					<option value='nail'>Nail art</option>
					<option value='fasion'>Fasion</option>
				</select>" ;
		}//end of else if
	}
?>
	<div class="row margin-top-cms">
		<!-- include the menu -->
		<?php include("partial/cmsmenu.php");?>
		<div class="large-9 columns">
			<h2> <?php echo $category;?> New Post</h2>
			<p>You can <em>create</em> New post from this page. Make sure to select the category.</p>
			<div class="mar-top">
				<form action="newpost_handler.php" method="post" enctype="multipart/form-data">
				<label>Title of the post
					<input type="text" name="title" required>
				</label><br>
				<label>Sub category
					<?php echo $subcategoryOption;?>
				</label><br>
					<textarea id="editor1" name="contents" rows="10" cols="80" class="ckeditor" required></textarea><br>
					<label>Tags
						<input type="text" name="tag" value=""/>
					</label><br>
					<label>Thumbnail Image (small image)
						   <input type="file" name="image" value="<?php  echo $upload = true;?>" required/>
					</label>
					<input name="category" type="hidden" value="<?php echo $category;?>">
					<input name="submit" type="submit" value="Submit New Post">
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