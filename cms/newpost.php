<?php session_start(); ?>
<?php //if the username is wrong od logoutbutton has pressed, kill the session
include("logout_handler.php");
include("partial/cmsheader.php");
?>
	<div class="row margin-top-cms">
		<!-- include the menu -->
		<?php include("partial/cmsmenu.php");?>
		<div class="large-9 columns">
			<h2> NEW Post</h2>
			<p>You can <em>create</em> New post from this page. <br> Make sure to select the category.</p>
			<div class="mar-top">
				<form action="newpost_handler.php" method="post" enctype="multipart/form-data">
				<label>Title of the post
					<input type="text" name="title">
				</label><br>
				<label>Sub category
					<select name="subcategory" value="<?php echo $subcategory; ?>">
						<option value="eyemakeup">Eye Makeup</option>
						<option value="basemakeup">Base Makeup</option>
						<option value="skincare">Skin care</option>
						<option value="perfume">Perfume</option>
						<option value="makeuptool">Makeup tools</option>
					</select>
				</label><br>
					<textarea id="editor1" name="contents" rows="10" cols="80" class="ckeditor"><?php echo $contents;?> </textarea><br>
					<label>Tags
						<input type="text" name="tag" value="<?php echo $tag; ?>"/>
					</label><br>
					<label>Sumbnail Image (small image)
						   <input type="file" name="image" value="<?php echo $upload;?>"/>
					</label>
					<span>Curent Image<img src="../images/thumb/<?php echo $image;?>"/></span><br>

					<input type="hidden" name="current" value="<?php echo $image;?>" />
					<input type="hidden" name="id" value="<?php echo $id;?>" />

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