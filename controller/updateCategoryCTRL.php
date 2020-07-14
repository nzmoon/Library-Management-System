<?php

include_once "../Model/Books.php";

$obj = new Books();
$obj->updateCategory($_GET['cat_id'],$_POST['cat_name']);

header("location: ../view/Admin/Book/add_book_category.php");