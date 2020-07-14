<?php

date_default_timezone_set("Asia/Dhaka");
include_once "../Model/BorrowBooks.php";
include_once "../Model/Notification.php";

$obj = new BorrowBooks();

$borrowedDate = date("y-m-d h:i:s");

$date = date_create($borrowedDate);
$returnDate = date_add($date,date_interval_create_from_date_string("10 days"));



$returnDate = date_format($date, "y-m-d h:i:s");

$status = 1;

$obj->approved($borrowedDate,$returnDate,$status,$_GET['borrow_id'],$_GET['u_id']);

$objnt = new Notification();

$message = "The book you requested is approved.";

$objnt->storeNotification($_GET['u_id'],$message);

header("Location: ../view/Admin/Notification/showBorrowRequest.php");





