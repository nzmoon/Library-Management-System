<?php
include_once "../Model/Books.php";


$obj = new Books();
$obj->addBookInformation($_POST);


header("Location: ../view/Admin/Book/add_book_information.php");