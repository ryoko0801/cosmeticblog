<?php include("partials/header.php");
include("partials/function.php");?>


<div class="row columns">
	<img  src="http://placehold.it/1200x400">
</div>
<div class="row section-margin-top">
<div class="large-6 medium-6 small-12 columns">
	<form class="contact-form">
	<h4 class="mar">Contact Me </h4>
		<label ><i class="fa fa-user fa-s" aria-hidden="true"></i><span class="com-area">&nbsp;Name</span>		<input id="contactName"  type="text" placeholder="Name" required>
		</label>
		<label><i class="fa fa-envelope-o fa-s" aria-hidden="true"></i><span class="com-area"> &nbsp;E-mail</span>
		<input type="email" placeholder="abcde@aaaa.com" equired pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"> </label>
		<label><i class="fa fa-comments fa-s" aria-hidden="true"></i><span class="com-area"> &nbsp;Comments</span>
			<textarea maxlength="500" placeholder="Feel free to give us comments"></textarea>
		</label>
		<input type="submit" class="button right" value="Submit">
	</form>
</div>
<div class="large-6 medium-6 small-12 columns">
	<img class="con-img" src="./images/hello.png">
</div>
</div>















<?php include("partials/footer.php");