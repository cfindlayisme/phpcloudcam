<?php
    // Copyright 2018 Chuck Findlay
    // This file is part of PHPCloudCam
    // PHPCloudCam is licensed under the GNU Lesser General Public License v3.0
?>
    <div class="row content">
        <div class="col-sm-3 sidenav content">
            <br>
            <ul class="nav nav-pills nav-stacked">
            <li class="nav-item active" id="dashboardNav" onclick="navSelected(this);"><a class="nav-link" onclick="viewDashboard();" href="#">Dashboard</a></li>
            <li class="nav-item" id="accountSettingsNav" onclick="navSelected(this);"><a class="nav-link" onclick="viewAccountSettings();" href="#">Account Settings</a></li>
            <li class="nav-item" id="snapshotNav" onclick="navSelected(this);"><a class="nav-link" onclick="viewSnapshotsList();" href="#">Live Snapshots</a></li>
            <li class="nav-item" id="recentActivityNav" onclick="navSelected(this);"><a class="nav-link" onclick="viewRecentActivity();" href="#">Recent Activity</a></li>
            <li class="nav-item" id="listRecordingsNav" onclick="navSelected(this);"><a class="nav-link" onclick="viewListRecordings();" href="#">Recordings by List</a></li>
            </ul><br>

        </div>