<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // No need for header or footer - we just output a snapshot. But users do need to be logged in
    include('..' . DIRECTORY_SEPARATOR . 'session.php');

    // Given a camera ID to use
    if (isset($_GET['cameraid'])) {
        $id = $_GET['cameraid'];
        $stmt = $db->prepare('SELECT snapshot_url, snapshot_content FROM cameras WHERE cameraid = ?');

        if ($stmt == false) {
            // TO-DO: Output something to signify list is empty. For now just die
            die('Nothing found');
        }
        $stmt->bind_param('i',$id);

        $stmt->execute();
        $stmt->bind_result($url, $content);
        $stmt->fetch();

        // If jpeg (or jpg) then set the header properly
        if ($content == 'jpeg' || $content == "jpg") {
            header("Content-type: image/jpeg");
        }

        // Grab the snapshot URL and send it out
        print file_get_contents($url);

    } elseif(isset($_GET['labels'])) {

        // 16 limit if nothing set
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        } else {
            $limit = 16;
        }

        $stmt = $db->prepare('SELECT label, cameraid, snapshot_url FROM cameras LIMIT ?');
        $stmt->bind_param('i',$limit);

        $stmt->execute();
        $stmt->bind_result($label, $cameraid, $snapshot_url);

        $data = array();
        while ( $stmt->fetch() ) {
            if ($snapshot_url != NULL) // If there is a null snapshot URL then no snapshot set up for this camera
                $data[] = array('label' => $label, 'cameraid' => $cameraid);
        }

        print json_encode($data);
    } else {

        // Nothing useful was sent to us
        http_response_code(400);

    }

?>
