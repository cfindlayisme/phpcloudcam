<?php
    // Copyright 2018 Chuck Findlay
    // This software is licensed under the GNU Lesser General Public License v3.0

    include('../config.inc.php');

    include('../theme/header.inc.php');

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
            $error = "Logon or password invalid.";
        }
    }
?>
      <div align="center">
         <div style = "width:300px; border: solid 1px #333333;" align="left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
<?php if (!($error == NULL)) { ?>
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
<?php }?>
					
            </div>
				
         </div>
			
      </div>
<?php

    include ('../theme/footer.inc.php');
?>
