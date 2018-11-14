function viewLiveView(cameraid) {

}

function viewSnapshot(cameraid) {
    document.getElementById('snapshotSpace').innerHTML = '<img class="img-fluid img-rounded" src="snapshot.php?cameraid=' + cameraid + '"><br>';
}

function viewRecentRecordings() {
    var obj, dbParam, xmlhttp, myObj, x, txt = '';
    obj = { table: 'recentRecordings', limit: 16 };
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            txt += '<select>';
            txt += '<option disabled selected value>--</option>';
            for (x in myObj) {
                txt += '<option value="' + myObj[x].id + '">' + myObj[x].timestamp + '</option>';
            }
            txt += '</select>';
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
    var obj, dbParam, xmlhttp, myObj, x, txt = '';
    obj = { table: 'cameraLabels', limit: 16 };
    dbParam = JSON.stringify(obj);
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