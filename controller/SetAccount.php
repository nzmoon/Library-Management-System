<?php
if (!isset($_SESSION)) session_start();

include_once "../Model/Student.php";
include_once "../Model/Teacher.php";

if ($_SESSION['role'] == "Student"){
    date_default_timezone_set('Asia/Dhaka');
    if (array_key_exists('password',$_POST))
        $password = md5($_POST['password']);

    $date = date('Y/m/d');
    $_POST['reg_date'] = $date;

    $status = 1;

    $_POST['status'] = $status;
    $_POST['std_id'] = $_SESSION['std_id'];

    $obj = new Student();
    $std =$obj->setAccount($password,$_POST['reg_date'], $_POST['status'], $_POST['std_id']);

    header("Location: ../view/login.php");
}
elseif ($_SESSION['role'] == "Teacher"){

    if (array_key_exists('password',$_POST)){
        $password = md5($_POST['password']);
    }

    $_POST['teachers_id'] = $_SESSION['teachers_id'];

    $obj = new Teacher();
    $tec = $obj->setAccount($password, $_POST['teachers_id']);

    header("Location: ../view/login.php");
}

else{
    header("Location: ../view/forPassword.php");
}
