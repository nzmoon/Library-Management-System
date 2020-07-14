<?php

include_once "../Model/Teacher.php";

if (!isset($_SESSION)) session_start();

$path=$_FILES['file']['name'];
$present_location=$_FILES['file']['tmp_name'];

$lecturetemp = explode('.',$present_location);

$lecture = explode(".",$path);


$a=move_uploaded_file($present_location,'../teachers_resource/'.$lecture[0]);


$_POST['file']=$path;
$_POST['uploader_id'] = $_SESSION['u_id'];

$obj = new Teacher();

$obj->uploadlecture($_POST);

header("Location: ../view/Teacher/UploadLecture/uploadlecture.php");
