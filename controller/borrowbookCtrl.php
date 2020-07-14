<?php
if (!isset($_SESSION)) session_start();

include_once "../Model/BorrowBooks.php";
include_once "../Model/Books.php";

$count = new Books();
$countQuantity=$count->countbookquantity($_GET['book_id']);

$bookQuantity=$countQuantity->quantity - 1;

$count->updateQuantity($_GET['book_id'],$bookQuantity);

$obj = new BorrowBooks();
$obj->store($_GET['book_id'],$_SESSION['u_id']);

$_SESSION['borrowRequestMSG'] = 1;

if($_SESSION['role'] == "Student"){
    header("Location: ../view/Student/Book/showBook.php");
}
elseif ($_SESSION['role'] == "Teacher"){

    header("Location: ../view/Teacher/Book/showBook.php");
}


