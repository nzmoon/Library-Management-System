<?php
if (!isset($_SESSION)) session_start();

include_once "../Model/Admin.php";

$obj= new Admin();
$logout=$obj->logout();
session_destroy();
header("Location: ../view/login.php");