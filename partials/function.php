<?php
function database_conn(){
	//make a connection to the database
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "cosmeticblog";
	//for real site		
/*	$host = "localhost";
			$user = "ryokonag_dance";
			$password = "rn19381031";
			$database = "ryokonag_danceroom";*/
	// connect to the database
			$conn = mysqli_connect($host, $user, $password, $database);
			if(!$conn){
				die("Connection has failed: " . mysqli_connect_error());
				exit;
			}
			return $conn;
}//end of the database_ conn function

//set the default timezone as Canada
date_default_timezone_set ( 'Canada/Pacific' );

//form validation function
function validate_input($data) {
	//to remove white spase
	$data = trim($data);
  //remove back slash
	$data = stripslashes($data);
  //escape
	$data = htmlspecialchars($data);
  //make it small letter avoid the issue of case lower or upper
  //$data= strtolower($data);
	return $data;
}


//function to upload image()
function uploadImages($directory){
	//dir to save the image data
		$dir=$directory;
	if( $_FILES['image'] == true){
	//grub the image uploaded
		$upfile=$_FILES["image"]["name"];
		if(!empty ($upfile)){
	//get file extentions
			$ext=substr($upfile,-3);
			if($ext!="jpg" && $ext!="gif" && $ext!="png"){
				$er["image"]="file extension sshould be jpg, gif, or png"; 
			}else{
		//check the file dir to avoid over writing
				$filelist=scandir($dir);
				foreach($filelist as $file){
					if(!is_dir($file)){
						if($upfile==$file){
							$er["double"]="the file is already exsisting";
						}
					}
				}
		}//end of else
		//if there is No error message inside $er, upload file
		if(empty ($er)){
			move_uploaded_file($_FILES["image"]["tmp_name"],$dir.$upfile);
		}else{
			foreach($er as $e);
			return $e;
		}
	}
}//end of if
else{
	$deletefiles = $delete;
	if(!empty ($deletefiles)){
		if(file_exists($dir.$deletefiles)){
			unlink($dir.$deletefiles);
		}
	}
	}
}//end of the function




?>