<?php include("partials/header.php");
include("partials/function.php");?>

<?php
//connect to database
$conn = database_conn();
$subcategoryMenu="";
$singlePost="";
$sideBar="";

if($_GET["category"] == "reviews"){
	if(isset($_GET['subcategory']))$query = "SELECT * FROM review_table WHERE subcategory='".$_GET['subcategory']."' ORDER BY id DESC";
	else $query = "SELECT * FROM review_table ORDER BY id DESC LIMIT 6";
	
	$subcategoryMenu.="<li><a href='categorypage.php?category=reviews&subcategory=eyemakeup#list'>Eye Makeup</a></li>
	<li><a href='categorypage.php?category=reviews&subcategory=basemakeup#list'>Base Makeup</a></li>
	<li><a href='categorypage.php?category=reviews&subcategory=skincare#list'>Skin care</a></li>
	<li><a href='categorypage.php?category=reviews&subcategory=perfume#list'>Perfume</a></li>
	<li><a href='categorypage.php?category=reviews&subcategory=makeuptool#list'>Tools</a></li>";
}else if($_GET["category"] == "trend"){
	if(isset($_GET['subcategory']))$query = "SELECT * FROM trend_table WHERE subcategory='".$_GET['subcategory']."' ORDER BY id DESC";
	else $query = "SELECT * FROM trend_table ORDER BY id DESC LIMIT 6 ";
	$subcategoryMenu.="<li><a href='categorypage.php?category=trend&subcategory=hairstyle#list'>Hair Style</a></li>
	<li><a href='categorypage.php?category=trend&subcategory=makeup#list'>Trend Makeup</a></li>
	<li><a href='categorypage.php?category=trend&subcategory=nail#list'>Nail Art</a></li>
	<li><a href='categorypage.php?category=trend&subcategory=fasion#list'>Fasion</a></li>";
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

			$sideBar .="<div class='media-object'>
						<div class='media-object-section sideimg'>
							<img class='thumbnail' src='./images/thumb/".$image."'>
						</div>
						<div class='media-object-section title'>	
						<a class='' href='blog.php?id=".$id."'><h5 class='js-short-title-side'>".$title."</h5>
						</a>
						<a class='button more right' href='blog.php?id=".$id."'>Read More</a>
						</div>
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
								<li><a href="categorypage.php?category=<?php echo $_GET["category"];?>#list">New</a></li>
								<?php echo $subcategoryMenu; ?>
							</ul>
						</div>
					</div>
					<div id="list" class="row">
						<?php echo $singlePost;?>
						</div>
					</div><!-- end of large8 section-->

			<!-- side bar -->
			<div class="large-4  medium-4 columns side">
				<div class ="bottom-line center margin-menu-btm">
					<h4>Popular Posts</h4>
				</div>
				<div class="row column section-margin-top">
					<?php echo $sideBar;?>
				</div>
			</div><!--    end of side-->
		</div><!-- end of top row -->


		<!-- end side bar -->


















		<?php include("partials/footer.php"); ?>