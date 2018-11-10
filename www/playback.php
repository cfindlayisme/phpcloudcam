<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // No need for header or footer - we just output a snapshot. But users do need to be logged in
    include('../session.php');

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

        // TO-DO: Read and output archived recording

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
        $stmt->bind_result($listing, $timestamp);
        $stmt->fetch();

        // TO-DO: JSON listing of recordings available with their IDs

    }

    // Nothing useful was sent to us
    http_response_code(400);
?>