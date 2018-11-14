    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4 class="siteTitle">PHPCloudCam</h4>

            <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ul><br>

            <h4 class="cameraList">Live Camera Links</h4>
            <div id="liveCameraList">
            </div><br>

            <div class="input-group">
            <h4>Recent Recordings</h4>
            <div id="recentRecordings"></div>

                

    </div>

    <script type ="text/javascript">
    window.onload = liveCamerasList();
    window.onload = recentRecordingsList();

    function liveView(cameraid) {

    }

    function snapShot(label, cameraid) {
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

    // List live cameras on the sidebar
    function liveCamerasList() {
        var obj, dbParam, xmlhttp, myObj, x, txt = '';
        obj = { table: 'cameraLabels', limit: 16 };
        dbParam = JSON.stringify(obj);
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myObj = JSON.parse(this.responseText);
                txt += '<table class="nav nav-pills nav-stacked">';
                for (x in myObj) {
                    txt += '<tr><td>' + myObj[x].label + '</td> <td><a href="#" onclick="snapShot(\'' + myObj[x].label + '\', ' + myObj[x].cameraid + ');">(Snapshot)</a></td></tr>';
                }
                txt += '</table>';
                document.getElementById('liveCameraList').innerHTML = txt;
            }
        }
        xmlhttp.open('GET', 'stream.php?labels=&limit=16', true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send();
    }
    </script>