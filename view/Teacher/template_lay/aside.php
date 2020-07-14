<?php
if (!isset($_SESSION)) session_start();
include_once "templateurl.php";


$obj = new Teacher();
$teacher=$obj->teacherSidebar($_SESSION['email']);


?>

<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="<?php echo photo?><?php echo $teacher->photo?>" class="img-circle" width="60"></a></p>
            <h5 class="centered"><?php echo $teacher->full_name?></h5>

            <li class="mt">
                <a class="active" href="<?php echo tempUrlTec?>index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo tempUrlTec?>Book/showBook.php" >
                    <i class="fa fa-book"></i>
                    <span>Book List</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Lecture</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo tempUrlTec?>UploadLecture/uploadlecture.php">Upload Lecture</a></li>
                    <li><a  href="<?php echo tempUrlTec?>UploadLecture/lectures.php">Show Lecture</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cloud-download"></i>
                    <span>Borrow List</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo tempUrlTec?>BorrowList/approved.php">Approved</a></li>
                    <li><a  href="<?php echo tempUrlTec?>BorrowList/pending.php">Pending</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?php echo tempUrlTec?>Return_list/return_list.php" >
                    <i class=" fa fa-cloud-upload"></i>
                    <span>Return List</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-bitbucket"></i>
                    <span>Requisition</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo tempUrlTec?>Requisition/add_requisition.php">ADD Requisition</a></li>
                    <li><a  href="<?php echo tempUrlTec?>Requisition/showApproveRequisition.php">Approve Requisition</a></li>
                    <li><a  href="<?php echo tempUrlTec?>Requisition/showPendingRequisition.php">Pending Requisition</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>