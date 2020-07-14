<?php
session_start();

include_once "../../../Model/BorrowBooks.php";
include_once "../../../Model/Admin.php";
$obj = new BorrowBooks();
$all=$obj->showAll();
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
                    Request For Book
                </h1>
            </div>
            <div class="row">
                <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Book Name</th>
                        <th>Submitted Date</th>
                        <th>Request From</th>
                        <th>Request From ID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $serial =0; foreach ($all as $one){ $serial++?>
                        <tr>
                            <td><?php echo $serial?></td>
                            <td><?php echo $one->book_name?></td>
                            <td><?php echo $one->submitted_date?></td>
                            <td><?php echo $one->full_name?></td>
                            <td><?php echo $one->u_id?></td>
                            <td>
                                <a class="btn btn-primary" href="../../../controller/approvedBook.php?u_id=<?php echo $one->u_id?>&borrow_id=<?php echo $one->borrow_id?>" style="border-radius: 20px">Approve</a>
                            </td>
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
