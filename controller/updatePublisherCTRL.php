<?php

include_once "../Model/Publisher.php";

$obj = new Publisher();
$obj->updatePublisher($_GET['id'],$_POST['publisher_name']);

header("Location: ../view/Admin/Publisher/add_publisher.php");