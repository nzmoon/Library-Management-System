<?php

if (!isset($_SESSION)) session_start();
include_once "../Model/Teacher.php";

$_POST['u_id'] = $_SESSION['u_id'];

$obj = new Teacher();
$obj->storeBookRequisition($_POST);

header("Location: ../view/Teacher/Requisition/add_requisition.php");