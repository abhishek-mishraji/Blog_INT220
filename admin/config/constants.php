<?php
session_start();
define("ROOT_URL", "https://vivekpandeyblog-ac22f5318f84.herokuapp.com/");
define('DB_HOST', 'xq7t6tasopo9xxbs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('DB_USER', 'vcf900not8pc0upr');
define('DB_PASS', 'elrpdu6o0sbaoz54');
define('DB_NAME', 'kqszyk3cwshgko7s');
if (!isset($_SESSION['user-id'])) {
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
    die();
    header("location: " . ROOT_URL . "signin.php");
}
