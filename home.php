<?php
    session_start();

    if(isset($_SESSION['user_full'])) {
        $user = $_SESSION['user_full'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/home.css">
    </head>
    <body></body>
</html>

<?php
    } else {
        header('Location: index.php');
    }


