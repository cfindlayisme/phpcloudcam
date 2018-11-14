    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4 class="siteTitle">PHPCloudCam</h4>

            <ul class="nav nav-pills nav-stacked">
            <li class="active"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul><br>

            <h4>Camera Snapshots</h4>
            <div id="snapCameraList"></div><br>

            <div class="input-group">
            <h4>Recent Recordings</h4>
            <div id="recentRecordings"></div>

        </div>
    </div>

    <!-- Internal Functions -->
    <script src="js/functions.js"></script>
    <script type="text/javascript" >
    window.onload = snapCamerasList();
    window.onload = recentRecordingsList();
    </script>