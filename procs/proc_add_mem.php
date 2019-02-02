<?php
session_start();

require_once '../lib/db.php';

if(!isset($_SESSION['user_full'])) return;
if(!isset($_POST) || empty($_POST)) return;

$db = conndb();
$id = $_SESSION['user_full'];

extract($_POST);

$mems_date = $date == 1 ? date('Y-m-d') : $inp_date;
$mems_description = $inp_desc != '' ? $inp_desc : 'No description';


$stmt = $db->prepare('INSERT INTO memories(memrs_title, memrs_date, memrs_description, categories_idcategories) VALUES( ? , ? , ? , ? )');

$stmt->bind_param('sssi', $inp_title, $mems_date, $mems_description, $sel_cat);

$stmt->execute();

if($stmt->affected_rows > 0){
    $_SESSION['success_add'] = 1;
    header('Location: ../add_mem.php');
} else {
    $_SESSION['succcess_add'] = 0;
    header('Location: ../add_mem.php');
}


