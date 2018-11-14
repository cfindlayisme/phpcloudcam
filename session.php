<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // Include configuration
    include('..' . DIRECTORY_SEPARATOR . 'config.inc.php');

    // Start session, check if user value is set in session, and kick user to login page if not
    session_start();
   
    $user_check = $_SESSION['luser'];

    $lstmt = $db->prepare('SELECT username FROM admin WHERE username = ?');
    $lstmt->bind_param('s',$lUsername);

    $lstmt->execute();
    $lstmt->bind_result($login_session);
    $lstmt->fetch();
    $lstmt->close();
   
    if(!isset($_SESSION['luser'])){
        header("Location: login.php");
    }
?>