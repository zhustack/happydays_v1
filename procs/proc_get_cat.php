<?php
session_start();

require_once '../lib/db.php';

if(isset($_SESSION['user_full'])) {

    $iduser = $_SESSION['user_full']['idusers'];
    $db = conndb();

    $stmt = $db->prepare('SELECT idcategories, ctgr_name FROM categories WHERE users_idusers = ?');
    $stmt->bind_param('i', $iduser);
    $stmt->execute();
    $result = $stmt->get_result();
    

    if($result->num_rows > 0) {
        
        $list = array();
        while($item = $result->fetch_assoc()) {
            $list[] = $item;
        }

        $result_json = json_encode($list);

        echo $result_json;

        $stmt->close();
        $db->close();
    } else {
        echo 'null';
    }
}