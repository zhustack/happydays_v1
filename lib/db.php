<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "happydays";

$sqli = null;

function conndb() {
    global $server, $user, $pass, $dbname, $sqli;
    return $sqli = new mysqli($server, $user, $pass, $dbname);
}

function execdb($query) {

}

