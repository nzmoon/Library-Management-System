<?php
if (!isset($_SESSION)) session_start();
include_once "../../../Model/Teacher.php";
include_once "../../../Model/Comments.php";


$obj = new Teacher();
$showlecture = $obj->showlecture();

$comments = new Comments();

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "../template_lay/head.php" ?>
<style>
    .lectures {
        background: #fff;
        box-sizing: border-box;
        -webkit-box-shadow: 2px 2px 4px 5px #ccc;
        -moz-box-shadow: 2px 2px 4px 5px #ccc;
        box-shadow: 2px 2px 4px 5px #ccc;
    }

    nav {
    }

    nav ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    nav ul li {
        border: 1px solid #a4abbb;
        border-radius: 5px;
        min-height: 100px;
        margin-bottom: 5px;
    }

    .serial {
        border-right: 2px solid #a4abbb;
        line-height: 65px;
        font-size: 21px;
        text-align: right;
        margin-top: 12px;
    }

    .modal-content {
        min-height: 500px;
        overflow: scroll;
        overflow: -moz-scrollbars-vertical;
    }

    .contents {
        margin: 20px;
        position: relative;
    }

    .contents button {
        display: block;
        text-align: right;
        position: absolute;
        top: 150px;
        right: 0;
    }

    .show_comment {
        border-top: 1px solid #8e908c33;
        position: absolute;
        top: 232px;
    }
    .commentss{
        min-height: 70px;
        border-bottom: 1px solid #5965611a;
        padding-top: 5px;
    }
    .username img{
        width: 30%;
        float: left;
        border-radius: 50%;
        height: 57px;
    }
    .username p{
        width: 60%;
        float: right;
        margin-left: 10px;
    }

</style>
<body>

<section id="container">
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
                    <i class="fa fa-angle-right"></i> Show Lecture
                </h2>
            </div>
            <div class="row">
                <div class="content col-lg-12">


                    <div class="lectures col-lg-12" style="min-height: 60vh">
                        <h3>
                            <i class="fa fa-angle-right"></i> All Lecture
                        </h3>
                        <nav>
                            <ul>
                                <?php $serial = 0;
                                foreach ($showlecture as $lecture) {
                                    $serial++ ?>
                                    <li>
                                        <div class="serial col-lg-1">
                                            <p><?php echo $serial ?></p>
                                        </div>
                                        <div class="file-name col-lg-9">
                                            <a href="../../../teachers_resource/<?php echo $lecture->resource?>"
                                               target="_blank">
                                                <h4 id="title<?php echo $lecture->resource_id ?>"><?php echo $lecture->title ?></h4>
                                            </a>
                                            <span>



                                            <?php

                                            date_default_timezone_set("Asia/Dhaka");

                                            $upload_date = date_create("$lecture->upload_date");
                                            $current_date = date_create(date("Y-m-d h:i:s"));
                                            $interval = date_diff($upload_date, $current_date);
                                            print $interval->format("%m Months %d Days %h hours %i minutes ago");

//                                            $time= $comments->get_time_ago($lecture->time);

                                            ?>
                                                <a id="<?php echo $lecture->resource_id ?>" data-toggle="modal"
                                                   onclick="get(this);fetch(this)" data-target=".bd-example-modal-lg"> | view comment</a>
                                        </span>
                                        </div>
                                        <div class="options col-lg-2">
                                            <h5 id="upldr<?php echo $lecture->resource_id ?>">Uploaded
                                                By <?php echo $lecture->full_name ?></h5>
                                            <span><a href="">Click here to show pdf or download</a></span>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
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

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4>Post a Comment</h4>
        </div>
        <div class="modal-content">
            <div class="contents">

                <h5 id="set_title">Lecture Name: </h5>
                <p id="set_up">Uploader Name:</p>


                <form class="form-inline" action="../../../controller/commentCtrl.php" method="post" style="">

                    <input id="rs_id" type="hidden" name="resource_id" value="">

                    <div class="form-group col-lg-2" style="padding: 0 0 0 0">
                        <label for="exampleInputEmail1"><?php echo $_SESSION['full_name']?></label>
                    </div>
                    <div class="form-group col-lg-10" style="padding: 0 0 0 0">
                        <textarea id="cmnt" class="form-control" name="comment" required style="width: 100%"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="send();fetch_now()">Comment</button>
                </form>
            </div>

            <div class="show_comment col-lg-12">
                <h5 class="text-center">Show Comment</h5>
                <!--                --><?php
                //                $allCmnt = $comments->showcomment($rs_id);// acca tui amake statik vebe design ta deka ... design temon kicui nai.. just data dekhabei....otai deka
                //
                //                foreach ($allCmnt as $cmnt) {
                //                    ?>
                <!--                    <div class="row">-->
                <!--                        <div class="col-lg-2 username">-->
                <!--                            <p>--><?php // echo $cmnt->full_name?><!--</p>-->
                <!--                        </div>-->
                <!--                        <div class="col-lg-10 comments">-->
                <!--                            --><?php //echo $cmnt->comment?>
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                --><?php //}?>
                <div id="shw_cmnt" class="row">

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function get(e) {
        console.log(e.id);
        var id = e.id;
        var title = document.getElementById("title" + id).innerHTML;
        var uploader = document.getElementById("upldr" + id).innerHTML;

        document.getElementById("set_title").innerText = title;
        document.getElementById("set_up").innerText = uploader;
        document.getElementById("rs_id").value = id;
    }

    function send() {
        var resource_id = document.getElementById("rs_id").value;
        var comnt = document.getElementById("cmnt").value;
        var user = "<?php echo $_SESSION['u_id']?>";
        var data = {
            "rs_id": resource_id,
            "cmnt": comnt,
            "user_id": user
        };

        $.ajax({
            url: "../../../controller/commentCtrl.php",
            type: "post",
            data: data,
            success: function (success) {
                console.log(success);
            }
        })

    }

    function fetch(e) {
        var id = e.id;

        var data = {"fetch_id": id};

        $.ajax({
            url: "../../../controller/commentCtrl.php",
            type: "post",
            data: data,
            success: function (success) {
                console.log(success);
                document.getElementById("shw_cmnt").innerHTML = success;
            }
        })

    }

    function fetch_now() {
        var id = document.getElementById("rs_id").value;

        var data = {"fetch_id": id};

        $.ajax({
            url: "../../../controller/commentCtrl.php",
            type: "post",
            data: data,
            success: function (success) {
                console.log(success);
                document.getElementById("shw_cmnt").innerHTML = success;
            }
        })

    }



</script>
</body>
</html>
