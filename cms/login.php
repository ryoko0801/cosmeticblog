<?php include("partial/cmsheader.php");?>
<div class="row login_container">
	<div class="large-offset-3 medium-6 medium-offset-3 large-6column">
	<p class="center">Login</p>
	<form class="" action="login_handler.php" method="post" >

		<div class="input-group">
		<span class="input-group-label"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
			<input class="input-group-field" type="text" required name="username">
		</div>

		<div class="input-group">
		<span class="input-group-label"><i class="fa fa-unlock-alt  fa-2x" aria-hidden="true"></i></span>
			<input class="input-group-field" type="text" required name="password">
		</div>

		<input type="submit" name="submit" class="right button">
	</form>
	</div>
</div>














<?php include("partial/cmsfooter.php");?>