<?php //sidebar
$querySideResult = mysqli_query( $conn, $querySide );
$numberOfRowsSide = mysqli_num_rows( $querySideResult );


if( $numberOfRowsSide > 0 ){
	while( $row = mysqli_fetch_assoc($querySideResult)){
		$id = $row["id"];
		$title = $row["title"];
		$image = $row["image"];
		$category = $row["category"];
		$sideBar .="<div class='media-object'>
					<div class='media-object-section sideimg'>
						<img class='thumbnail' src='./images/thumb/".$image."'>
					</div>
					<div class='media-object-section title'>	
					<a class='' href='blog.php?id=".$id."'><h5 class='js-short-title-side'>".$title."</h5>
					</a>
					<a class='button more right side' href='blog.php?category=".$category."&id=".$id."'>Read</a>
					</div>
				</div>";
	}
}