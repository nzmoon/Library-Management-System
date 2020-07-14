<?php
if (!isset($_SESSION)) session_start();

include_once "../../../Model/Student.php";
include_once "../../../Model/Notification.php";
if (array_key_exists('id',$_GET)){
    $objnt = new Notification();
    $objnt->updateNotification($_GET['id']);
}

$obj = new Student();
$all=$obj->ShowapproveRequest($_SESSION['u_id']);

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "../template_lay/head.php" ?>

<body>

<section id="container" style="min-height: 94vh">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php include_once "../template_lay/header.php" ?>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php include_once "../template_lay/aside.php" ?>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="page-header">
                <h1>
                    Borrowed Books
                </h1>
            </div>
            <div class="row">
                <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>SBN</th>
                        <th>Book Title</th>
                        <th>Writer</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>SBN</th>
                        <th>Book Title</th>
                        <th>Writer</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $i=0; foreach ($all as $one){ $i++?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $one->sbn?></td>
                            <td><?php echo $one->book_name?></td>
                            <td><?php echo $one->writer_name?></td>
                            <td><?php echo $one->cat_name?></td>
                            <td><?php echo $one->publisher_name?></td>
                            <td><?php echo $one->borrow_date?></td>
                            <td><?php echo $one->return_date?></td>
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
<?php include_once "../template_lay/footer.php" ?>
<!-- js placed at the end of the document so the pages load faster -->
<?php include_once "../template_lay/script.php" ?>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</body>
</html>
