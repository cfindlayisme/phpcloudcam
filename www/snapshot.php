<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // No need for header or footer - we just output a snapshot. But users do need to be logged in
    include('../session.php');

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
        echo file_get_contents($url);
    }

    // Nothing useful was sent to us
    http_response_code(400);

?>
