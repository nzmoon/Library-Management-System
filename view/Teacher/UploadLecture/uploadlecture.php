<?php

include_once "../../../Model/Teacher.php";
if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "../template_lay/head.php" ?>

<style>
    .content{
        background: #fff;
        padding: 20px;
        box-sizing: border-box;
        -webkit-box-shadow: 2px 2px 5px 1px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
        -moz-box-shadow:    2px 2px 5px 1px #ccc;  /* Firefox 3.5 - 3.6 */
        box-shadow:         2px 2px 5px 1px #ccc;
    }
</style>
<body>

<section id="container" >
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
    <section id="main-content" style="min-height: 95vh">
        <section class="wrapper">
            <div class="page-header">
                <h2>
                    <i class="fa fa-angle-right"></i> Upload Lecture
                </h2>
            </div>
            <div class="row">
                <div class="content col-lg-6 col-md-offset-3">
                    <div class="uploadlecture">
                        <form action="../../../controller/addLecture.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Lecture Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Lecture Title">
                            </div>
                            <div class="form-group">
                                <label>Upload Lecture</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary" style="border-radius: 20px">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!--main content end-->
    <!--footer start-->
    <?php include_once "../template_lay/footer.php" ?>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<?php include_once "../template_lay/script.php" ?>


</body>
</html>
