<?php
    //when user pressed logout, end the session
    if(isset($_POST['logout']) OR !isset($_SESSION['admin'])){
        session_start();
        session_unset();
        session_destroy();
        header("location: login.php");
    }
