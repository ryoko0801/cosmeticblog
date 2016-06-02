<?php //sidebar
$sideBar="";
$querySideResult = mysqli_query( $conn, $querySide );
$numberOfRowsSide = mysqli_num_rows( $querySideResult );


if( $numberOfRowsSide > 0 ){
	while( $row = mysqli_fetch_assoc($querySideResult)){
		$id = $row["id"];
		$title = $row["title"];
		$image = $row["image"];
		$category = $row["category"];
		$sideBar .="<a href='post.php?category=".$category."&id=".$id."'>
					<div class='media-object'>
					<div class='media-object-section sideimg'>
						<img class='thumbnail' src='./images/thumb/".$image."'>
					</div>
					<div class='media-object-section title'>	
			<h5 class='js-short-title-side'>".$title."</h5>
					</div>
				</div></a>";
	}
	return $sideBar;
}