<?php include("partials/header.php");
include("partials/function.php");?>

<?php
//connect to database
$conn = database_conn();

$singlePost="";
$singlePostTrend="";

$reviewPostQuery = "SELECT * FROM review_table ORDER BY id DESC LIMIT 3 ";
$trendPostQuery = "SELECT * FROM trend_table ORDER BY id DESC LIMIT 3 ";
$querySide = "SELECT * FROM review_table ORDER BY RAND() LIMIT 4";

include("partials/_sidebar.php");
//grub the data from database depend on the category
$trendQueryResult = mysqli_query( $conn, $trendPostQuery );
$trendnumberOfRows = mysqli_num_rows( $trendQueryResult );

//grub the data from database depend on the category
$reviewQueryResult = mysqli_query( $conn, $reviewPostQuery );
$reviewnumberOfRows = mysqli_num_rows( $reviewQueryResult );

if( $reviewnumberOfRows > 0 ){
  while( $row = mysqli_fetch_assoc($reviewQueryResult)){
    $id = $row["id"];
    $subcategory = $row["subcategory"];
    $title = $row["title"];
    $date = $row["posted_date"];
    $contents = $row["contents"];
    $image = $row["image"];
    $category = $row["category"];

    $singlePost.="<div class='row'>
    <div class='large-4 columns margin-post article'>
      <div class='points'>
        <div class='image'><img src='./images/thumb/".$image."'><span class='point-ribbon point-ribbon-l'>".$subcategory."</span>
        </div>
      </div>
    </div>
    <div class='large-8 columns margin-post'>
      <h3 class='js-short-title-index'>".$title."</h3>
      <span class='js-short-text-index'>".$contents."</span>
      <a class='button more right' href='post.php?category=".$category."&id=".$id."'>Read More</a>
      `   </div>
    </div>";
  }
  }//end of while
  if( $trendnumberOfRows > 0 ){
    while( $row = mysqli_fetch_assoc($trendQueryResult)){
      $id = $row["id"];
      $subcategory = $row["subcategory"];
      $title = $row["title"];
      $date = $row["posted_date"];
      $contents = $row["contents"];
      $image = $row["image"];
      $category = $row["category"];

      $singlePostTrend.="<div class='row'>
      <div class='large-4 columns margin-post article'>
        <div class='points'>
          <div class='image'><img src='./images/thumb/".$image."'><span class='point-ribbon point-ribbon-l'>".$subcategory."</span>
          </div>
        </div>
      </div>
      <div class='large-8 columns margin-post'>
        <h3 class='js-short-title-index'>".$title."</h3>
        <span class='js-short-text-index'>".$contents."</span>
        <a class='button more right' href='post.php?category=".$category."&id=".$id."'>Read More</a>
        `   </div>
      </div>";
    }
  }//end of while
  ?>


  <body>
    <div class="row columns">
      <img src="http://placehold.it/1200x400">
    </div>
    <div class="row">
      <!-- new post -->
      <div class="large-8  medium-8 columns ">
        <div class ="bottom-line center margin-menu-btm">
         <h4>New Post</h4>
       </div>
       <?php echo $singlePost;?>
       <?php echo $singlePostTrend;?>
     </div>
     <!-- end new post -->

     <!-- side bar -->
     <div class="large-4  medium-4 columns side">
      <div class ="bottom-line center margin-menu-btm">
       <h4>Popular Posts</h4>
     </div>
     <div class="row column section-margin-top">
     <?php echo $sideBar;?>
   </div>
   <!-- end side bar -->
   <div class="row column section-margin-top">
        <img src="images/sephora_ad.jpg"/>
        <img src="images/nord_ad.png"/>
        </div>
   </div>
 </div><!-- end row -->







 <?php include("partials/footer.php"); ?>   