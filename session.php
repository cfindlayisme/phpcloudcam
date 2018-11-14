<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // Include configuration
    include('..' . DIRECTORY_SEPARATOR . 'config.inc.php');

    // Start session, check if user value is set in session, and kick user to login page if not
    session_start();
   
    if(!isset($_SESSION['luser'])){
        header("Location: login.php");
    }
?>