<?php
    // Copyright 2018 Chuck Findlay
    // This file is part of PHPCloudCam
    // PHPCloudCam is licensed under the GNU Lesser General Public License v3.0

    // Obviously user needs to be logged in
    include('..' . DIRECTORY_SEPARATOR . 'session.php');

    // From session.php we know $_SESSION['luser'] = the users ID index in SQL

    if (isset($_GET['info'])) {
        $stmt = $db->prepare('SELECT username FROM admin WHERE id = ?');

        if ($stmt == false) {
            // TO-DO: Output something to signify list is empty. For now just die
            die('Nothing found');
        }
        $stmt->bind_param('i',$_SESSION['luser']);

        $stmt->execute();
        $stmt->bind_result($username);

        $data = array();
        while ( $stmt->fetch() ) {
            $data[] = array('username' => $username);
        }

        $stmt->close();
        print json_encode($data);
    } else {
        // Nothing useful was sent to us
        http_response_code(400);
    }
?>