<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // No need for header or footer - we just output a stream. But users do need to be logged in
    include('..' . DIRECTORY_SEPARATOR . 'session.php');

    // Given a camera ID to use
    if (isset($_GET['cameraid'])) {
        $id = $_GET['cameraid'];
        $stmt = $db->prepare('SELECT stream_url, stream_content FROM cameras WHERE cameraid = ?');
        $stmt->bind_param('i',$id);

        $stmt->execute();
        $stmt->bind_result($url, $content);
        $stmt->fetch();

        // TO-DO: sending out the stream
    } elseif(isset($_GET['labels'])) {

        // 16 limit if nothing set
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        } else {
            $limit = 16;
        }

        $stmt = $db->prepare('SELECT label, cameraid FROM cameras LIMIT ?');
        $stmt->bind_param('i',$limit);

        $stmt->execute();
        $stmt->bind_result($label, $cameraid);

        $data = array();
        while ( $stmt->fetch() ) {
            $data[] = array('label' => $label, 'cameraid' => $cameraid);
        }

        print json_encode($data);
    }
?>
