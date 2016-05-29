<?php include("partials/header.php");
include("partials/function.php");?>
<?php
//connect to database
$conn = database_conn();
$id = $_GET["id"];
$category = $_GET["category"];

$singlePost="";
$recommendedPost="";

if($_GET["category"] == "reviews"){
	//for side bar (select the article randomly)
	$querySide =  "SELECT * FROM review_table ORDER BY RAND() LIMIT 4";
	$queryPost = "SELECT * FROM review_table WHERE id='$id'";
	$queryRecomend = "SELECT * FROM review_table WHERE category='$category' ORDER BY RAND() LIMIT 4";
}else if($_GET["category"] == "trend"){
	$querySide =  "SELECT * FROM trend_table ORDER BY RAND() LIMIT 4";
	$queryPost = "SELECT * FROM trend_table WHERE id='$id'";
	$queryRecomend = "SELECT * FROM trend_table WHERE category='$category' ORDER BY RAND() LIMIT 4";
}
//include the side bar
include("partials/_sidebar.php");
//singlepost query
$queryPostResult = mysqli_query( $conn, $queryPost );
$numberOfRows = mysqli_num_rows( $queryPostResult);

//related post query
$queryRecomendResult = mysqli_query( $conn, $queryRecomend );
$numberOfRowsRecom = mysqli_num_rows( $queryRecomendResult );

if( $numberOfRows > 0 ){
		while( $row = mysqli_fetch_assoc($queryResult)){
		$subcategory = $row["subcategory"];
		$title = $row["title"];
		$date = $row["posted_date"];
		$contents = $row["contents"];
		$image = $row["image"];
		$tag = $row["tag"];
	
		$singlePost.="<div class='large-12 columns margin-post article'>
					<div class='points'>
						<div class='image'><img src='./images/thumb/".$image."'><span class='point-ribbon point-ribbon-l'>".$subcategory."</span></div>
					</div>
					<h3 class='js-short-title'>".$title."</h3>
					<span class='js-short-text'>".$contents."</span>
					<a class='button more right' href='blog.php?id=".$id."'>Read More</a>
			`		</div>";
		}
	}//end of while
?>


	



<body>
	<div class="row columns">
		<img src="http://placehold.it/1200x400">
	</div>
	<div class="row">
		<!-- new post -->
		<div class="large-8  medium-8 columns section-margin-top">
			<div class="row column">
				<h2>Title Of the post</h2>
				<span class="day">Day</span>
				<img src="http://placehold.it/1800x400">
			</div>
			<div class="row column">
				<img src="http://placehold.it/1800x400">
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




























	<?php include("partials/footer.php"); 