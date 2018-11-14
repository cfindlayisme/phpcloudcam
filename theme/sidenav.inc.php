    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4 class="siteTitle">PHPCloudCam</h4>

            <ul class="nav nav-pills nav-stacked">
            <li class="active" id="dashboardNav"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
            <li class="nav-item" id="snapshotNav"><a class="nav-link" onclick="viewSnapshotsList();" href="#">Live Snapshots</a></li>
            <li class="nav-item" id="snapshotNav"><a class="nav-link" onclick="viewRecentRecordings();" href="#">Recent Recordings</a></li>
            <li class="nav-item" id="logoutNav"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul><br>

            <div class="input-group">
            <h4>Recent Recordings</h4>
            <div id="recentRecordings"></div>

        </div>
    </div>