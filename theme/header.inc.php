<?php
    // Copyright 2018 Chuck Findlay
    // This file is part of PHPCloudCam
    // PHPCloudCam is licensed under the GNU Lesser General Public License v3.0
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHPCloudCam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php print BOOTSTRAP_CSS; ?>">
    <link rel="stylesheet" href="css/main.css">

    <!-- jQuery -->
    <script src="<?php print JQUERY_JS; ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php print BOOTSTRAP_JS; ?>"></script>
    <!-- Chart.js -->
    <script src="<?php print CHART_JS; ?>"></script>
    <!-- Our functions -->
    <script src="js/functions.js"></script>

</head>
<body>
  <header class="container-fluid">
      <p class="pull-right"> 
      <div class="pull-left">PHPCloudCam</div><a class="nav-link" href="logout.php"><i class="pull-right" data-feather="log-out"></i></a>
      </p>
  </header>
  <div class="container-fluid fill">