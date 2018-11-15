<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // No need for header or footer - we just output a snapshot. But users do need to be logged in
    include('..' . DIRECTORY_SEPARATOR . 'session.php');

    // ID known to requestor, so lets spit the recording back to them
    if (isset($_GET['id'])) {
        $stmt = $db->prepare('SELECT file, content FROM recordings WHERE id = ?');

        if ($stmt == false) {
            // TO-DO: Output something to signify list is empty. For now just die
            die('Nothing found');
        }
        $stmt->bind_param('i',$_GET['id']);

        $stmt->execute();
        $stmt->bind_result($file, $content);
        $stmt->fetch();

        $stmt->close();
        // TO-DO: output content-type header
        print file_get_contents(FILE_RECORDINGS . DIRECTORY_SEPARATOR . $file);

    // List request of recordings for a given camera ID
    } elseif (isset($_GET['list']) && isset($_GET['cameraid'])) {
        $listLimit = 16;
        if (isset($_GET['limit'])) {
            $listLimit = $_GET['limit'];
        }
        $stmt = $db->prepare('SELECT id, timestamp FROM recordings WHERE cameraid = ? LIMIT ?');

        if ($stmt == false) {
            // TO-DO: Output something to signify list is empty. For now just die
            die('Nothing found');
        }
        $stmt->bind_param('ii',$_GET['cameraid'], $listLimit);

        $stmt->execute();
        $stmt->bind_result($id, $timestamp);

        $data = array();
        while ( $stmt->fetch() ) {
            $data[] = array('id' => $id, 'timestamp' => $timestamp);
        }

        $stmt->close();
        print json_encode($data);

    } elseif(isset($_GET['info']) && isset($_GET['id'])) {
        $stmt = $db->prepare('SELECT timestamp, content FROM recordings WHERE id = ?');

        if ($stmt == false) {
            // TO-DO: Output something to signify list is empty. For now just die
            die('Nothing found');
        }
        $stmt->bind_param('i',$_GET['id']);

        $stmt->execute();
        $stmt->bind_result($timestamp, $content);

        // Should only be one result since ID is the unique key
        $stmt->fetch();
        $data = array('id' => $_GET['id'], 'timestamp' => $timestamp, 'content' => $content);

        $stmt->close();
        print json_encode($data);

    } elseif(isset($_GET['count']) && isset($_GET['from']) && isset($_GET['to'])) {

        $date1 = $_GET['from'] . ' 00:00:00';
        $date2 = $_GET['to'] . ' 23:59:59';

        if (isset($_GET['cameraid'])) {
            $stmt = $db->prepare('SELECT COUNT(*) FROM recordings WHERE cameraid = ? AND timestamp BETWEEN ? AND ?');
            $stmt->bind_param('iss', $_GET['cameraid'], $date1, $date2);
        } else {
            $stmt = $db->prepare('SELECT COUNT(*) FROM recordings WHERE timestamp BETWEEN ? AND ?');
            $stmt->bind_param('ss', $date1, $date2);
        }
       
        if ($stmt == false) {
            // TO-DO: Output something to signify list is empty. For now just die
            die('Nothing found');
        }

        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();

        $data = array('count' => $count, 'from' => $date1, 'to' => $date2);

        $stmt->close();
        print json_encode($data);

    } elseif(isset($_GET['getrecent'])) {

        $listLimit = 16;
        if (isset($_GET['limit'])) {
            $listLimit = $_GET['limit'];
        }

        $stmt = $db->prepare('SELECT id, timestamp FROM recordings LIMIT ?');

        if ($stmt == false) {
            // TO-DO: Output something to signify list is empty. For now just die
            die('Nothing found');
        }
        $stmt->bind_param('i',$listLimit);

        $stmt->execute();
        $stmt->bind_result($id, $timestamp);

        $data = array();
        while ( $stmt->fetch() ) {
            $data[] = array('id' => $id, 'timestamp' => $timestamp);
        }

        $stmt->close();
        print json_encode($data);

    } else {

        // Nothing useful was sent to us
        http_response_code(400);

    }
?>