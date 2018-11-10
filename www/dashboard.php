<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // Our session bit needs to be in here first. It'll kick out anyone who is not logged in
    include('../session.php');

    include('../theme/header.inc.php');
?>
You're logged in! This is a placeholder page. To logout go to <a href="logout.php">this spot.</a>
<?php
    include ('../theme/footer.inc.php');
?>