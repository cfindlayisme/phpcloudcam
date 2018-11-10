<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU General Public License v3.0

    // This is a pretty simple one - just destroys the session and redirects the user to the logon page
    session_start();
   
    if(session_destroy()) {
        header("Location: login.php");
    }
?>