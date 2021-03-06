<?php
session_start();
date_default_timezone_set("Asia/Dhaka");

include_once "../../../Model/BorrowBooks.php";
include_once "../../../Model/Admin.php";
$obj = new Admin();
$all=$obj->returnList();



?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "../../head.php" ?>

<body>

<section id="container" style="min-height: 94vh">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php include_once "../../header.php" ?>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php include_once "../../aside.php" ?>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="page-header">
                <h1>
                    Show Return List
                </h1>
            </div>
            <div class="row">
                <table id="example" class="table table-striped table-bordered" width="100%" style="font-size: 12px" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Return Form</th>
                        <th>Return Form ID</th>
                        <th>Book Name</th>
                        <th>Request Date</th>
                        <th>Borrowed Date</th>
                        <th>Return Date</th>
                        <th>Day Exceed</th>
                        <th>Fine</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $serial=0; foreach ($all as $one){ $serial++?>
                            <tr>
                                <td><?php echo $serial?></td>
                                <td><?php echo $one->full_name?></td>
                                <td><?php echo $one->u_id?></td>
                                <td><?php echo $one->book_name?></td>
                                <td><?php echo $one->submitted_date?></td>
                                <td><?php echo $one->borrow_date?></td>
                                <td><?php echo $one->return_date?></td>
                                <td><?php echo $one->day_exceed?></td>
                                <td><?php echo $one->fine?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>

                <!-- /col-lg-3 -->
            </div><! --/row -->
        </section>
    </section>

    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
</section>
<?php include_once "../../footer.php" ?>
<!-- js placed at the end of the document so the pages load faster -->
<?php include_once "../../script.php" ?>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</body>
</html>
