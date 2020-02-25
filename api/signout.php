<?php
session_start();
//clear session from globals
$_SESSION = array();
//clear session from disk
session_destroy();

session_unset();
header("location: ../index.html");
?>