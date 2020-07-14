<?php


include_once "../Model/Writer.php";

$obj = new Writer();
$obj->updateWriter($_GET['id'],$_POST['writer_name']);

header("Location: ../view/Admin/Writer/add_writer.php");