<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // Our session bit needs to be in here first. It'll kick out anyone who is not logged in
    include('..' . DIRECTORY_SEPARATOR . 'session.php');

    include('..' . DIRECTORY_SEPARATOR . 'theme' . DIRECTORY_SEPARATOR . 'header.inc.php');

    include('..' . DIRECTORY_SEPARATOR . 'theme/sidenav.inc.php');
?>
    <div class="col-sm-9">
      <h2 id="pageTitle"></h2>
      <div id="pageContent"></div>
    </div>

<?php
    include ('../theme/footer.inc.php');
?>