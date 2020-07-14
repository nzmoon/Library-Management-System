<?php
if (!isset($_SESSION)) session_start();


include_once "../Model/Comments.php";
include_once "../view/templateurl.php";

$obj = new Comments();


/*$_POST['u_id'] = $_SESSION['u_id'];*/
if (array_key_exists('rs_id', $_POST)) {
    $obj->commentStore($_POST);
}
if (array_key_exists('fetch_id', $_POST)) { ?>

    <?php $rslt = $obj->showcomment($_POST['fetch_id']);
    foreach ($rslt as $item) {
//        date_default_timezone_set("Asia/Dhaka");
//        $upload_date = date_create("$item->time");
//        $current_da = date("Y-m-d H:i:s");
//        $current_date = date_create($current_da);
//        /*print_r($current_date);
//        echo "<br>";
//        print_r($upload_date);*/
//        $interval = $upload_date->diff($current_date);
//        $t = $interval->format('%d Days %h hours %i minutes ag');

        $time= $obj->get_time_ago($item->time);
        ?>
        <?php echo "
        <div class='commentss'>
            <div class='col-lg-3 username'>
            <img src=" . photoUrl . "$item->photo class='img-responsive'>
            <p>$item->full_name</p>
        </div>
        <div class='col-lg-9 comments'>
        <p>$item->comment</p>
        <p>$time</p>
        </div>
        </div>
         " ?>

    <?php } ?>
<?php } ?>








