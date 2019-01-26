<?php
require_once '../lib/db.php';

session_start();

extract($_POST);


if((isset($inp_user) && isset($inp_pass)) && (!empty($inp_user && !empty($inp_pass)))) {
    verify_user($inp_user, $inp_pass);
}

function verify_user($inp_user, $inp_pass) {
    $db = conndb();
    $stmt = $db->prepare('SELECT idusers FROM users WHERE (usr_email = ? OR usr_nick = ?) AND usr_pass = ?');
    $stmt->bind_param('sss', $inp_user, $inp_user, $inp_pass);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $result_array = $result->fetch_assoc();
        $stmt->close();
        $db->close();

        $_SESSION['user_full'] = $result_array;
        header('Location: ../home.php');
    } else {
        $_SESSION['error-login'] = true; 
        header('Location: ../index.php');
    }

    
}

