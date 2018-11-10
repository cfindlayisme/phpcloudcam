<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU General Public License v3.0

    // Include configuration
    include('../config.inc.php');

    // Start session, check if user value is set in session, and kick user to login page if not
    session_start();
   
    $user_check = $_SESSION['luser'];
   
    $ses_sql = mysqli_query($db, "SELECT username FROM admin WHERE username = '$user_check' ");
   
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   
    $login_session = $row['username'];
   
    if(!isset($_SESSION['luser'])){
        header("Location: login.php");
    }
?>