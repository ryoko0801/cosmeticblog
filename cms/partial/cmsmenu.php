<div class="title-bar" data-responsive-toggle="cmsmenu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title">Menu</div>
</div>
	<div class="large-3 columns center">

<div class="cms-nav">
<ul id="cmsmenu" class="vertical menu " data-responsive-menu="drilldown medium-dropdown">
  <li><a href="#">Review page</a>
  	<ul class="vertical menu">
      <li><a href="newpost.php?category=reviews">New Post</a></li>
      <li><a href="reviewpage_list.php?category=reviews">List of the posts</a></li>
    </ul>
  </li>
  <li><a href="#">Trend page</a>
  	<ul class="vertical menu">
      <li><a href="newpost.php?category=trend">New Post</a></li>
      <li><a href="reviewpage_list.php?category=trend">List of the posts</a></li>
    </ul>
  </li>
  <li>
	  <form action="logout_handler.php" method="post">
	  	<input type="submit" name="logout" value="Log Out" class="button full">
	  </form>
  </li>
</ul>
</div>
</div>