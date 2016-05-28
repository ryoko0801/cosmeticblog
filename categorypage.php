<?php include("partials/header.php");
include("partials/function.php");?>

<?php
//connect to database
$conn = database_conn();
$subcategoryMenu="";
$singlePost="";
if($_GET["category"] == "reviews"){
	if(isset($_GET['subcategory']))$query = "SELECT * FROM review_table WHERE subcategory='".$_GET['subcategory']."' ORDER BY id DESC";
	else $query = "SELECT * FROM review_table ORDER BY id DESC";
	
	$subcategoryMenu.="<li><a href='categorypage.php?category=reviews&subcategory=eyemakeup'>Eye Makeup</a></li>
	<li><a href='categorypage.php?category=reviews&subcategory=basemakeup'>Base Makeup</a></li>
	<li><a href='categorypage.php?category=reviews&subcategory=skincare'>Skin care</a></li>
	<li><a href='categorypage.php?category=reviews&subcategory=perfume'>Perfume</a></li>
	<li><a href='categorypage.php?category=reviews&subcategory=makeuptool'>Tools</a></li>";
}else if($_GET["category"] == "trend"){
	$query = "SELECT * FROM trend_table ORDER BY id DESC";
}
//grub the data from database depend on the category
$queryResult = mysqli_query( $conn, $query );

if($queryResult == false){ echo $conn->error; exit; }
 //$query = "SELECT * FROM gallery WHERE hair_type = $_POST[hair_type]";
$numberOfRows = mysqli_num_rows( $queryResult );
if( $numberOfRows > 0 ){
	while( $row = mysqli_fetch_assoc($queryResult)){
		$id = $row["id"];
		$subcategory = $row["subcategory"];
		$title = $row["title"];
		$date = $row["posted_date"];
		$contents = $row["contents"];
		$image = $row["image"];
		$tag = $row["tag"];
		$category = $row["category"];
	
		$singlePost.="<div class='large-6 columns margin-post article'>
								<div class='points'>
									<div class='image'><img src='./images/thumb/".$image."'><span class='point-ribbon point-ribbon-l'>".$subcategory."</span></div>
								</div>
								<h3 class='js-short-title'>".$title."</h3>
								<span class='js-short-text'>".$contents."</span>
								<a class='button more right' href='blog.php?id=".$id."'>Read More</a>
						</div>";
		}//end of while
			var_dump($singlePost);
	}
	mysqli_close($conn);
;?>
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
								<li><a href="categorypage.php?category=<?php echo $_GET["category"];?>">New</a></li>
								<?php echo $subcategoryMenu; ?>
							</ul>
						</div>
					</div>
					<div id="list" class="row">
						<?php echo $singlePost;?>
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