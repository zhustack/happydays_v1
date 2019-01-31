<?php
    session_start();

    if(isset($_SESSION['user_full'])) {
        $user = $_SESSION['user_full'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/home.css">
    </head>
    <body>
        <div class="container"> 
            <div class="container-sup">
                <label>HappyDays App</label>
                <hr>
                <p>The HappyDays App is a web app for you to save and read the daily happiness memories.</p>
            </div>
            <div class="container-sub">
                <div class="funcs">
                    <a href="add_mem.php">
                        <i class="far fa-sticky-note"></i>
                        <label>New Memories</label>
                    </a>
                </div>
                <div class="funcs">
                    <a href="New Memories">
                        <i class="far fa-sticky-note"></i>
                        <label>Sorted Memories</label>
                    </a>
                </div>
                <div class="funcs">
                    <a href="New Memories">
                        <i class="far fa-sticky-note"></i>
                        <label>View Memories</label>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    } else {
        header('Location: index.php');
    }


