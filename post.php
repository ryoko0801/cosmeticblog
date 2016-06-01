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

if( $numberOfRows == 1){
		while( $row = mysqli_fetch_assoc($queryPostResult)){
		$subcategory = $row["subcategory"];
		$title = $row["title"];
		$date = $row["posted_date"];
		$contents = $row["contents"];
		$image = $row["image"];
		$tag = $row["tag"];
		}
	}//end of while
if( $numberOfRowsRecom > 0 ){
		while( $row = mysqli_fetch_assoc($queryRecomendResult)){
		$subcategoryR = $row["subcategory"];
		$category = $row["category"];
		$id = $row["id"];
		$titleR = $row["title"];
		$imageR = $row["image"];
		//reccomend posts
		$recommendedPost.= "<div class='large-3 medium-3 small-6 columns article-reco'>
					<a href='post.php?category=".$category."&id=".$id."'>
						<img src='./images/thumb/".$imageR."'>
						<h5>".$titleR."</h5>
					</a>
				</div>";
		}
	}

?>


	



<body>
	<div class="row columns">
		<img src="http://placehold.it/1200x400">
	</div>
	<div class="row">
		<!-- new post -->
		<div class="large-8  medium-8 columns section-margin-top">
			<div class="row column">
				<h2><?php echo $title;?></h2>
				<div class="blog-day"><?php echo $date;?></div>
			</div>
			<div class="row column">
				<?php echo $contents;?>
			</div>
			<!-- reccomended post -->
			<div class ="bottom-line center margin-menu-btm">
							<h4>You Might like this</h4>
					</div>
			<div class='row recom'>
				<?php echo $recommendedPost; var_dump($recommendedPost);?>
			</div>
			<!-- end of recommended post list -->
			<!-- reccomended post -->
			<div class ="bottom-line center margin-menu-btm">
							<h4>Comments of this post</h4>
					</div>
			<div class="row column ">
			<form  action="comment_handler.php" method="post">
				<input type="hidden" name="blog_id" value="<?php echo $id ?>" />
				<label><i class="fa fa-user margin-post" aria-hidden="true"></i> Name
				<input type="text" name="username"></label>
				<label><i class="fa fa-pencil" aria-hidden="true"></i> Title
				<input type="text" name="title"></label>
				<label><i class="fa fa-comments" aria-hidden="true"></i> Comments
				<textarea rows="5" type="text" name="comments" placeholder="Any comments here"></textarea></label>
			<input class="subbtn right" type="submit" value="Submit Comment"/>
			</form>
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
			<div class="row column section-margin-top">
				<img src="images/sephora_ad.jpg"/>
				<img src="images/nord_ad.png"/>
				</div>
		</div><!--    end of side-->
	</div><!-- end of top row -->
	<!-- end side bar -->
	<?php include("partials/footer.php"); 