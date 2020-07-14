<?php

if (!isset($_SESSION)) session_start();
include_once "templateurl.php";

$obj =new Student();
$student=$obj->studentSidebar($_SESSION['email']);

?>

<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="<?php echo photo?><?php echo $student->photo?>" class="img-circle" width="60"></a></p>
            <h5 class="centered"><?php echo $student->full_name?></h5>

            <li class="mt">
                <a class="active" href="<?php echo tempUrlStu?>index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo tempUrlStu?>Book/showBook.php" >
                    <i class="fa fa-book"></i>
                    <span>Book List</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo tempUrlStu?>lectures.php" >
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Lectures</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cloud-download"></i>
                    <span>Borrow List</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo tempUrlStu?>BorrowList/approved.php">Apporved</a></li>
                    <li><a  href="<?php echo tempUrlStu?>BorrowList/pending.php">Pending</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?php echo tempUrlStu?>Return_List/return_list.php">
                    <i class=" fa fa-cloud-upload"></i>
                    <span>Return List</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>