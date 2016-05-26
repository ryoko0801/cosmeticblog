<?php  session_start();?>
<?php
 include("../partials/function.php");
 //connect to the database if the data has been sent 
 if(isset($_POST['submit']) AND !empty($_POST['username']) AND !empty($_POST['password'])){
        //connect to the database
        $conn = database_conn();
        //if the error occured echo error message
        if(!$conn){
				echo"Connecton Failed";
			}else{
        echo"Connecton ";
        //for security, form validation
       $username = validate_input($_POST['username']);
        $password = validate_input($_POST['password']);

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);


        //query to grab the username and password
        $query = "SELECT * FROM user_table
        WHERE username = '$username' AND password = '$password'";
        $queryResult = mysqli_query($conn, $query);

          if($queryResult == false){
            echo $conn->error;
            exit;
          }

          //grab the data from the database as a row
          //if user can log in go to member only page
          //if it's failed, back to member page
        $rows = mysqli_num_rows($queryResult);

        if($rows === 1){
	        	$_SESSION['admin'] = $username;
            header("location: adminpage.php");
	        }
       else{
             header("location: login.php");
        }
     }

}//end of if statement


//close the connection
mysqli_close($conn);

?>