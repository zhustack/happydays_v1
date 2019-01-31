<?php
session_start();
require_once '../lib/db.php';

if(!isset($_SESSION['user_full'])) { return; }

if(!isset($_POST['cat_name'])) {
    return;
}

$id = $_SESSION['user_full']['idusers'];
$db = conndb();

$ctgr_name = $_POST['cat_name'];

$stmt = $db->prepare('INSERT INTO categories(ctgr_name, users_idusers) VALUES(?,?)');
$stmt->bind_param('si',$ctgr_name, $id);
$stmt->execute();
$stmt->close();
$db->close();

echo 'true';

