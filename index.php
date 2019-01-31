<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login HappyDays</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <div class="container">
            <div class="login">
                <form method="POST" action="procs/proc_login.php">
                    <label>Sign In</label>
                    
                    <div class="input-group">
                        <label for="inp_user">Email or Username</label>
                        <input type="text" id="inp_user" name="inp_user" onfocus="this.previousElementSibling.classList.add('label-animation');"
                        onblur="if(this.value == ''){this.previousElementSibling.classList.remove('label-animation');}">

                    </div>
                    
                    <div class="input-group">
                        <label for="inp_pass">Password</label>
                        <input type="password" id="inp_pass" name="inp_pass" onfocus="this.previousElementSibling.classList.add('label-animation');" onblur="if(this.value == ''){this.previousElementSibling.classList.remove('label-animation');}">
                    </div>
                    <?php
                        if(isset($_SESSION['error-login'])) {
                         echo "<label class='error-login'>User and / or password are wrong!</label>";
                         unset($_SESSION['error-login']);
                        }    
                    ?>
                    <button class="btn-login" type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </body>
</html>