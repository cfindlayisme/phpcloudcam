function viewLiveView(cameraid) {
    
}

function viewDashboard() {
    $('#pageContent').html('');
    $('#pageTitle').html('Dashboard');
}

function viewAccountSettings() {
    var txt = '';
    $.getJSON('account.php?info=', function(jd) {
        txt += '<h4>Password Change</h4>';
        txt += '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">\
                    <div class="form-group">\
                        <label class="control-label required">Username:</label>\
                        <input type="text" readonly class="form-control" name="username" value="'+jd[0].username+'">\
                    </div>\
                </div>';
        txt += '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">\
                    <div class="form-group">\
                        <label class="control-label required">Current password:</label>\
                        <input type="password" type="text" class="form-control" name="cpassword">\
                    </div>\
                </div>';
        txt += '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">\
                    <div class="form-group">\
                        <label class="control-label required">New password:</label>\
                        <input type="password" type="text" class="form-control" name="npassword1">\
                    </div>\
                </div>';
        txt += '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">\
                    <div class="form-group">\
                        <label class="control-label required">New password again:</label>\
                        <input type="password" type="text" class="form-control" name="npassword2">\
                    </div>\
                </div>';
        $('#pageContent').html(txt);
        $('#pageTitle').html('Account Settings');
    });
}

function viewRecording(id) {
    $('#recordingsPlaybackSpace').html('<video width="560" controls><source src="playback.php?id=' + id + '" type="video/mp4"></video>');
}

function viewSnapshot(cameraid) {
    $('#snapshotSpace').html('<img width="560" class="img-fluid img-rounded" src="snapshot.php?cameraid=' + cameraid + '"><br>');
}

function navSelected(selected) {
    $('.nav-item').each(function() {
        $(this).removeClass('active');
    });
    $(selected).addClass('active');
}

function viewRecentRecordings() {
    var txt = '';
    $.getJSON('playback.php?getrecent=&limit=16', function(jd) {
            txt += '<select onchange="if (this.selectedIndex) viewRecording(this.selectedIndex);">';
            txt += '<option disabled selected value>--</option>';
            $.each(jd, function(key, val) {
                txt += '<option value="' + val.id + '">' + val.timestamp + '</option>';
            });
            txt += '</select><br><br>';
            txt += '<div id="recordingsPlaybackSpace"></div>';
            $('#pageContent').html(txt);
            $('#pageTitle').html('Recent Recordings');
    });
}

function viewSnapshotsList() {
    var txt = '';
    $.getJSON('snapshot.php?labels=&limit=16', function(jd) {
            txt += '<select onchange="if (this.selectedIndex) viewSnapshot(this.selectedIndex);">';
            txt += '<option disabled selected value>--</option>';
            $.each(jd, function(key, val) {
                txt += '<option value="' + val.cameraid + '">' + val.label + '</option>';
            });
            txt += '</select><br><br>';
            txt += '<div id="snapshotSpace"></div>';
            $('#pageContent').html(txt);
            $('#pageTitle').html('Live Snapshots');
    });
}