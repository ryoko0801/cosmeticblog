<?php include("partials/header.php");
include("partials/function.php");?>

<?php
//connect to database
$conn = database_conn();
if($_GET["category"] == "reviews"){
	$query = "SELECT * FROM review_table ORDER BY id DESC";
}else if($_GET["category"] == "trend"){
	$query = "SELECT * FROM trend_table ORDER BY id DESC";
}
//grub the data from database depend on the category
$queryResult = mysqli_query( $conn, $query );

if($queryResult == false){ echo $conn->error; exit; }
 //$query = "SELECT * FROM gallery WHERE hair_type = $_POST[hair_type]";
$numberOfRows = mysqli_num_rows( $queryResult );

if( $numberOfRows > 0 ){
	while( $row=mysqli_fetch_row($queryResult) );}
	/*{
		$id = $row["id"];
		$subcategory = $row["subcategory"];
		$title = $row["title"];
		$date = $row["posted_date"];
		$contents = $row["contents"];
		$image = $row["image"];
		$tag = $row["tag"];
		$category = $row["category"];?>*/
		?>
		<body>
			<div class="row columns">
				<img src="http://placehold.it/1200x400">
			</div>
			<div class="row">
				<!-- new post -->
				<div class="large-8  medium-8 columns ">
					<div class ="bottom-line center margin-menu-btm">
						<div id="sub-nav" class ="top-nav">
							<ul class="">
								<li><a href="#">New</a></li>
								<li><a href="categorypage.php?category=reviews">Reviews</a></li>    
								<li><a href="categorypage.php?category=trend">Trend</a></li>       
								<li><a href="about.php">About</a></li>         
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="large-6 columns margin-post article">
								<div class="points">
									<div class="image"><img src="http://placehold.it/400x300"><span class="point-ribbon point-ribbon-l">NEWaa  a</span></div>
								</div>
								<h3>Title</h3>
								<p>test test tetst fguydfhf hfdjcfd st fguydfhf hfdjcf</p>
								<a class="button more" href='blog-page.php?id=".$id."'>Read More</a>
						</div>
						</div>
					</div><!-- end of large8 section-->


					


			<!-- side bar -->
			<div class="large-4  medium-4 columns">
				<div class ="bottom-line center margin-menu-btm">
					<h4>Popular Posts</h4>
				</div>
				<div class="row column section-margin-top">

					<div class="media-object">
						<div class="media-object-section">
							<img class="thumbnail" src="http://placehold.it/100">
						</div>
						<div class="media-object-section">
							<h5>All I need is a space suit and I'm ready to go.</h5>
						</div>
					</div>



				</div>
			</div><!--    end of side-->
		</div>


		<!-- end side bar -->


















		<?php include("partials/footer.php"); ?>