<?php
session_start();

include_once "../../../Model/Books.php";
include_once "../../../Model/Teacher.php";
$obj = new Books();
$allBooks = $obj->showAllBooks();


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
                    Show Book
                </h1>
            </div>
            <div class="row">
                <?php
                if (isset($_SESSION['borrowRequestMSG']) and $_SESSION['borrowRequestMSG']==1){
                    ?>
                    <div class="message col-md-12">
                        <div class="alert alert-success col-md-4 col-md-offset-4 text-center" id="show" style="display: block" role="alert">
                            Your <strong>Request</strong> Updated..
                        </div>
                    </div>
                    <?php $_SESSION['borrowRequestMSG']=0;}?>
                <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Book Title</th>
                        <th>Writer</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        <th>Publishing Year</th>
                        <th>SBN</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>Book Title</th>
                        <th>Writer</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        <th>Publishing Year</th>
                        <th>SBN</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $i=0; foreach ($allBooks as $singleBook){ $i++?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $singleBook->book_name?></td>
                        <td><?php echo $singleBook->writer_name?></td>
                        <td><?php echo $singleBook->cat_name?></td>
                        <td><?php echo $singleBook->publisher_name?></td>
                        <td><?php echo $singleBook->publishing_year?></td>
                        <td><?php echo $singleBook->sbn?></td>
                        <td><?php echo $singleBook->quantity?></td>
                        <td>

                            <?php if ($singleBook->quantity < "1"){?>
                                <a class="btn btn-primary" style="border-radius: 20px" href="" disabled>Request</a>
                            <?php } else{?>
                                <a class="btn btn-primary" style="border-radius: 20px" href="../../../controller/borrowbookCtrl.php?book_id=<?php echo $singleBook->id?>">Request</a>
                            <?php }?>
                            <a class="btn btn-primary active" style="border-radius: 20px" href="<?php echo $singleBook->pdf_link?>">Download</a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>

                    <script>
                        setTimeout(function () {
                            $('#show').fadeOut('slow');
                        },2000)
                    </script>
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
