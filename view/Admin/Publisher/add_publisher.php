<?php
if (!isset($_SESSION)) session_start();

include_once "../../../Model/Publisher.php";
include_once "../../../Model/BorrowBooks.php";
include_once "../../../Model/Admin.php";

$obj= new Publisher();

$countPublisher = $obj->countPublisher();


if(array_key_exists('item',$_SESSION)){
    if (array_key_exists('item',$_GET)){
        $_SESSION['item']=$_GET['item'];
    }
}
else{
    $_SESSION['item']=2;
}
$item=$_SESSION['item'];
if (array_key_exists('page',$_GET)){
    $page_no=$_GET['page'];
}
else{
    $page_no=1;
}

$buttonshow=ceil($countPublisher/$item);
$start = $item*($page_no-1);
$allPublisher= $obj->showPublisherPagination($start,$item);


?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "../../head.php" ?>

<style>

    .form{
        background: #fff;
        font-size: 16px;
        padding: 20px;
        box-sizing: border-box;
        -webkit-box-shadow: 2px 2px 4px 5px #ccc;
        -moz-box-shadow:    2px 2px 4px 5px #ccc;
        box-shadow:         2px 2px 4px 5px #ccc;
    }
    .form h2{
        margin-bottom: 25px;
    }

</style>
<body>

<section id="container" style="min-height: 130vh">
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
                <h2>
                    <i class="fa fa-angle-right"></i> Add Publisher
                </h2>
            </div>
            <div class="row">

                <form action="../../../controller/add_publisher.php" method="post" role="form" class="col-md-6 col-md-offset-3 form">
                    <h2><i class="fa fa-angle-right"></i> Books Publisher</h2>
                    <div class="form-group" style="padding: 25px 5px">
                        <label class="col-md-2">Publisher</label>

                        <div class="col-md-10">
                            <input type="text" class="form-control" name="publisher_name" placeholder="Add Publisher Name">
                        </div>
                    </div>
                    <div class="form-group" style="padding: 25px 5px;">
                        <label class="col-md-2">Action</label>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary" style="border-radius: 25px">Add Publisher</button>
                        </div>
                    </div>
                </form>
                <!-- /col-lg-3 -->
            </div><! --/row -->
            <hr>
            <div class="page-header">
                <h2>
                    <i class="fa fa-angle-right"></i>Publisher Table
                </h2>
            </div>
            <div class="row">
                <table class="table" style="font-size: 16px">
                    <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $serial =0; foreach ($allPublisher as $Publisher){?>
                        <?php $serial++;?>
                        <tr>
                            <th><?php echo $serial?></th>
                            <td><?php echo $Publisher->publisher_name?></td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $Publisher->id?>">Edit</button>
                                <div class="modal fade" id="exampleModalCenter<?php echo $Publisher->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Publisher</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="../../../controller/updatePublisherCTRL.php?id=<?php echo $Publisher->id?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Publisher Name</label>
                                                        <input type="text" class="form-control" name="publisher_name" value="<?php echo $Publisher->publisher_name?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                    <button type="submit" class="btn btn-primary" href="">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" style="text-align: center">
                    <ul class="pagination">
                        <?php for ($i=1; $i<=$buttonshow;$i++){?>
                            <li class="
                                <?php if ($_GET['page'] == $i){
                                echo 'active';
                            }
                            else{
                                echo 'page-item';
                            }
                            ?>
"><a class="page-link" href="add_publisher.php?page=<?php echo $i?>"><?php echo $i?></a></li>
                        <?php }?>
                        <select class="form-control" name="item" id="item" onchange="javascript:location.href = this.value;">
                            <?php
                            if($item==3 ) echo '<option value="?item=3" selected >Show 3 Items Per Page</option>';
                            else echo '<option  value="?item=3">Show 3 Items Per Page</option>';

                            if($item==2 ) echo '<option value="?item=2" selected >Show 2 Items Per Page</option>';
                            else echo '<option  value="?item=2">Show 2 Items Per Page</option>';

                            if($item==1 ) echo '<option value="?item=1" selected >Show 1 Items Per Page</option>';
                            else echo '<option  value="?item=1">Show 1 Items Per Page</option>';
                            ?>
                        </select>
                    </ul>
                </nav>
            </div>

        </section>
    </section>

    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
</section>
<?php include_once "../../footer.php" ?>
<!-- js placed at the end of the document so the pages load faster -->
<?php include_once "../../script.php" ?>


</body>
</html>
