<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    include('..' . DIRECTORY_SEPARATOR . 'config.inc.php');

    session_start();

    $error = NULL;
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
       
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
       
        $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
       
        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row
        if( $count == 1) {
            $_SESSION['luser'] = $myusername;
            
            header("Location: dashboard.php");
        } else {
            $error = "Username or password invalid.";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign in to PHPCloudCam</title>

    <link rel="stylesheet" href="<?php print BOOTSTRAP_CSS; ?>">

    <link href="css/signin.css" rel="stylesheet">
  </head>
        <body>
            <div class="container">
                    <body class="text-center">
                        <form class="form-signin" action="" method="post">
                            <h1 class="form-signin-heading">PHPCloudCam</h1>
                            <label for="inputUsername" class="sr-only">Username</label>
                            <input type="username" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
                            
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                            
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                            <?php if (!($error == NULL)) { ?>   
                                <div class="alert alert-danger fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Error!</strong> <?php echo $error; ?>
                                </div>
                            <?php }?>
                        </form>
                
                <!-- jQuery -->
                <script src="<?php print JQUERY_JS; ?>"></script>
                <!-- Bootstrap -->
                <script src="<?php print BOOTSTRAP_JS; ?>"></script>
            </div>
        </body>
</html>