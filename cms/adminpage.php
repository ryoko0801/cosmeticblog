<?php session_start() ;?>
<?php //if the username is wrong od logoutbutton has pressed, kill the session
include("logout_handler.php");?>

<?php include("partial/cmsheader.php");?>
<div class="row margin-top-cms">
	<!-- include the menu -->
		<?php include("partial/cmsmenu.php");?>

	<div class="large-9 columns">
		<h2>Welcome to your website, <?php echo $_SESSION['admin'];?> !</h2>
		<p>From this admin page, <br>You can Post a new article, Delete or Edit the post which you posted<br> Please select the menu from the menu.</p>
	</div>
</div>

<?php include("partial/cmsfooter.php");?>