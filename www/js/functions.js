function viewLiveView(cameraid) {
    
}

function viewRecording(id) {
    $('#recordingsPlaybackSpace').html('<video width="560" controls><source src="playback.php?id=' + id + '" type="video/mp4"></video>');
}

function viewSnapshot(cameraid) {
    $('#snapshotSpace').html('<img width="560" class="img-fluid img-rounded" src="snapshot.php?cameraid=' + cameraid + '"><br>');
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