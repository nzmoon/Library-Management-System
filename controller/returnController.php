<?php

include_once "../Model/Admin.php";
include_once "../Model/Notification.php";
include_once "../Model/Books.php";


$count = new Books();
$countQuantity=$count->countbookquantity($_GET['book_id']);

$bookQuantity=$countQuantity->quantity + 1;


$count->updateQuantity($_GET['book_id'],$bookQuantity);

$obj = new Admin();


$obj->bookReturn($_GET['borrow_id'],$_GET['u_id']);


$message = "Your book has been returned";

$objnt = new Notification();
$objnt->storeNotification($_GET['u_id'],$message);

header("Location: ../view/Admin/Return_book/return_book_list.php");