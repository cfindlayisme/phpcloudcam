<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    // No need for header or footer - we just output a stream. But users do need to be logged in
    include('../session.php');

    // Given a camera ID to use
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $db->prepare('SELECT url, content FROM stream_urls WHERE id = ?');
        $stmt->bind_param('i',$id);

        $stmt->execute();
        $stmt->bind_result($url, $content);
        $stmt->fetch();

        // TO-DO: sending out the stream
    }
?>
