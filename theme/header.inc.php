<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php // Todo: title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php print BOOTSTRAP_CSS; ?>">
  <script src="<?php print JQUERY_JS; ?>"></script>
  <script src="<?php print BOOTSTRAP_JS; ?>"></script>
  <style>
    .row.content {height: 700px}
    
    html, body {
        height: 100%;
    }

    /* 90.5 seems to be the magic spot */
    .wrap {
        height: 90.5%;
    }

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
<div class="wrap">
<div class="container-fluid">
    