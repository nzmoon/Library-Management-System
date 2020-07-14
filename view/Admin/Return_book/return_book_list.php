<?php
session_start();
date_default_timezone_set("Asia/Dhaka");

include_once "../../../Model/BorrowBooks.php";
include_once "../../../Model/Admin.php";
$obj = new BorrowBooks();
$all =$obj->forReturnList();



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
                        <th>Request Form</th>
                        <th>Request Form ID</th>
                        <th>Book Name</th>
                        <th>Submitted Date</th>
                        <th>Borrowed Date</th>
                        <th>Return Date</th>
                        <th>Day Exceed</th>
                        <th>Fine</th>
                        <th>Action</th>
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
                            <td>
                                <?php
                               $return_date =$one->return_date;
                               $current_date="18-8-20 8:45:50";
//                                $current_date = date("y-m-d h:i:s");
                                if ($current_date < $return_date){
                                    echo $one->day_exceed;
                                }else{

                                    $datetime1 = new DateTime($current_date);
                                    $datetime2 = new DateTime($return_date);
                                    $interval = $datetime1->diff($datetime2);
//                                    $interval = date_diff($datetime2,$datetime1);
                                    $day=$interval->d;
                                    $month=$interval->m;
                                    $obj->updateFineAndDay(($month*30)+$day,(($month*30)+$day)*10,$one->borrow_id);
                                    print $date_exceed= $month." month ".$one->day_exceed ." day ".$interval->h ."hour";
                                }

                                ?>
                            </td>
                            <td><?php echo $one->fine?></td>
                            <td>
                                <a class="btn btn-primary" href="" data-toggle="modal" data-target="#exampleModalCentered<?php echo $one->borrow_id?>" style="border-radius: 20px">Return</a>
                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#exampleModalCenter<?php echo $one->borrow_id?>" style="border-radius: 20px">Mail</a>
                                <div class="modal fade" id="exampleModalCenter<?php echo $one->borrow_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you want to send this mail?
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                <a type="button" class="btn btn-primary" href="../../../controller/forReturnBookMail.php?borrow_id=<?php echo $one->borrow_id?>">Sent Mail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModalCentered<?php echo $one->borrow_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Return Book</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you want to return <?php echo $one->book_name?> book?
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                <a type="button" class="btn btn-primary" href="../../../controller/returnController.php?borrow_id=<?php echo $one->borrow_id?>&u_id=<?php echo $one->u_id?>&book_id=<?php echo $one->book_id?>">Return Book</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
