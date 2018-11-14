function viewLiveView(cameraid) {

}

function viewSnapShot(label, cameraid) {
    document.getElementById('pageContent').innerHTML = '<img src="snapshot.php?cameraid=' + cameraid + '"><br>';
    document.getElementById('pageTitle').innerHTML = 'Snapshot of ' + label;
}

    // List live cameras on the sidebar
function recentRecordingsList() {
    var obj, dbParam, xmlhttp, myObj, x, txt = '';
    obj = { table: 'recentRecordings', limit: 16 };
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            txt += '<select>';
            for (x in myObj) {
                txt += '<option id="' + myObj[x].id + '">' + myObj[x].timestamp + '</option>';
            }
            txt += '</select><button class="btn btn-default" type="button" onclick="">';
            txt += '<span class="glyphicon glyphicon-search"></span>';
            txt += '</button>';
            document.getElementById('recentRecordings').innerHTML = txt;
        }
    }
    xmlhttp.open('GET', 'playback.php?getrecent=&limit=16', true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send();
}

// List snapshot cameras on the sidebar
function snapCamerasList() {
    var obj, dbParam, xmlhttp, myObj, x, txt = '';
    obj = { table: 'cameraLabels', limit: 16 };
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            txt += '<ul class="nav nav-pills nav-stacked">';
            for (x in myObj) {
                txt += '<li><a href="#" class="nav-link" onclick="viewSnapShot(\'' + myObj[x].label + '\', ' + myObj[x].cameraid + ');">' + myObj[x].label + '</a></li>';
            }
            txt += '</ul>';
            document.getElementById('snapCameraList').innerHTML = txt;
        }
    }
    xmlhttp.open('GET', 'stream.php?labels=&limit=16', true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send();
}