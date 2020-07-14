<?php
include_once "templateurl.php";

$obj = new BorrowBooks();
$obj1 = new Admin();

$totalrequisition=$obj1->countRequisition();

$totalrequest =$obj->countBorrowRequest();
$total = $totalrequest+$totalrequisition;


?>

<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="index.php"><img src="<?php echo url?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered">Library Management System</h5>

            <li class="mt">
                <a class="active" href="<?php echo tempUrl?>index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-users"></i>
                    <span>Student</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo tempUrl?>Student/add_student.php">Add Student</a></li>
                    <li><a  href="<?php echo tempUrl?>Student/show_student.php">Show Student</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-user"></i>
                    <span>Teacher</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo tempUrl?>Teacher/add_teacher.php">Add Teacher</a></li>
                    <li><a  href="<?php echo tempUrl?>Teacher/show_teacher.php">Show Teacher</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Book</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo tempUrl?>Book/add_book_category.php">Add Book Category</a></li>
                    <li><a  href="<?php echo tempUrl?>Book/add_book_information.php">Add Book Information</a></li>
                    <li><a  href="<?php echo tempUrl?>Book/showBook.php">Show Book Information</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?php echo tempUrl?>Publisher/add_publisher.php" >
                    <i class="fa fa-bank"></i>
                    <span>Publisher</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo tempUrl?>Writer/add_writer.php" >
                    <i class="fa fa-pencil"></i>
                    <span>Writer</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo tempUrl?>Return_book/return_book_list.php" >
                    <i class="fa fa-recycle"></i>
                    <span>Return Book</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-globe"></i>
                    <span>Notification</span>
                    <span class="badge badge-info"><?php echo $total?></span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo tempUrl?>Notification/showBorrowRequest.php">Show Borrow Request <span class="badge badge-info"><?php echo $totalrequest?></span></a>

                    </li>
                    <li><a  href="<?php echo tempUrl?>Notification/requisition.php">Requisition <span class="badge badge-info"><?php echo $totalrequisition?></span></a>

                    </li>
                </ul>
            </li>
            <li class="">
                <a href="<?php echo tempUrl?>BorrowedList/showBorrowedList.php" >
                    <i class="fa fa-columns"></i>
                    <span>Show Borrowed List</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo tempUrl?>Return_book/return_list.php" >
                    <i class="fa fa-archive"></i>
                    <span>Show Return List</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>