<?php

include_once "../Model/Admin.php";
include_once "../Model/Notification.php";



$obj = new Admin();
$obj->updaterequisition($_GET['req_id'],$_GET['u_id']);

$message = "Your Requisition book is approved.";

$objnt = new Notification();
$objnt->storeNotification($_GET['u_id'],$message);

header("Location: ../view/Admin/Notification/requisition.php");