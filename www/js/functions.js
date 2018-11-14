function viewLiveView(cameraid) {
    
}

function viewRecording(id) {
    document.getElementById('recordingsPlaybackSpace').innerHTML = '<video width="560" controls><source src="playback.php?id=' + id + '" type="video/mp4"></video>';
}

function viewSnapshot(cameraid) {
    document.getElementById('snapshotSpace').innerHTML = '<img class="img-fluid img-rounded" src="snapshot.php?cameraid=' + cameraid + '"><br>';
}

function viewRecentRecordings() {
    var xmlhttp, myObj, x, txt = '';
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            txt += '<select onchange="if (this.selectedIndex) viewRecording(this.selectedIndex);">';
            txt += '<option disabled selected value>--</option>';
            for (x in myObj) {
                txt += '<option value="' + myObj[x].id + '">' + myObj[x].timestamp + '</option>';
            }
            txt += '</select><br><br>';
            txt += '<div id="recordingsPlaybackSpace"></div>';
            document.getElementById('pageContent').innerHTML = txt;
            document.getElementById('pageTitle').innerHTML = 'Recent Recordings';
        }
    }
    xmlhttp.open('GET', 'playback.php?getrecent=&limit=16', true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send();
}

// List snapshot cameras on the sidebar
function viewSnapshotsList() {
    var xmlhttp, myObj, x, txt = '';
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            txt += '<select onchange="if (this.selectedIndex) viewSnapshot(this.selectedIndex);">';
            txt += '<option disabled selected value>--</option>';
            for (x in myObj) {
                txt += '<option value="' + myObj[x].cameraid + '">' + myObj[x].label + '</option>';
            }
            txt += '</select><br><br>';
            txt += '<div id="snapshotSpace"></div>';
            document.getElementById('pageContent').innerHTML = txt;
            document.getElementById('pageTitle').innerHTML = 'Live Snapshots';
        }
    }
    xmlhttp.open('GET', 'snapshot.php?labels=&limit=16', true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send();
}