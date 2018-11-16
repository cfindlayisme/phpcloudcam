<?php
    // Copyright 2018 Chuck Findlay
    // This file is part of PHPCloudCam
    // PHPCloudCam is licensed under the GNU Lesser General Public License v3.0

    // Our session bit needs to be in here first. It'll kick out anyone who is not logged in
    include('..' . DIRECTORY_SEPARATOR . 'session.php');

    // If not rediected by now then they are logged in, so redirect to dashboard
    header('Location: dashboard.php');
?>