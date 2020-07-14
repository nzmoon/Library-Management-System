<?php
if (!isset($_SESSION)) session_start();

include_once "../../../Model/Teacher.php";

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
                   Add Book Requisition  
                </h1>
            </div>
            <div class="row">
                <form class="form-inline" action="../../../controller/add_requisition.php" method="post">
                    <div class="form-group col-md-6"  style="padding: 4px; height: 65px">
                        <label class="col-sm-6 control-label no-padding-right">Book Title</label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" style="width: 100%" name="book_title" placeholder="Book Title">
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="padding: 4px; height: 65px">
                        <label class="col-sm-6 control-label no-padding-right">Book Category</label>

                        <div class="col-sm-12 form-group" >
                            <input type="text" class="form-control" style="width: 100%" name="book_category" placeholder="Book Category">
                        </div>
                    </div>
                    <div class="form-group col-md-4" style="padding: 5px; height: 65px">
                        <label class="col-sm-6 control-label no-padding-right">Publisher Name</label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" style="width: 100%" name="publisher_name" placeholder="Publisher Name">
                        </div>
                    </div>

                    <div class="form-group col-md-4" style="padding: 5px; height: 65px">
                        <label class="col-sm-6 control-label no-padding-right">Writer Name</label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" style="width: 100%" name="writer_name" placeholder="Writer Name">
                        </div>
                    </div>
                    <div class="form-group col-md-4" style="padding: 5px; height: 65px">
                        <label class="col-sm-12 control-label no-padding-right">Publishig Year</label>

                        <div class="col-sm-12">
                            <input type="date" class="form-control" style="width: 100%" name="publishing_year" placeholder="Publishing Year">
                        </div>
                    </div>
                    <div class="form-group col-md-12" style="padding: 5px">
                        <label class="col-sm-6 control-label no-padding-right">Description</label>

                        <div class="col-md-12">
                            <textarea name="description" style="width: 100%;border-radius: 3px;border: 1px solid #a4abbb;"></textarea>
                        </div>
                    </div>
                    <!---->
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 20px; border-radius: 15px">ADD Request</button>

                </form>       <!-- /col-lg-3 -->
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
