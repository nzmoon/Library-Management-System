<?php
include_once "templateurl.php";
?>
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="<?php echo tempUrl?>index.php" class="logo"><b>Port City International University</b></a>
    <!--logo end-->

    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="<?php echo controller?>logoutctrl.php">Logout</a></li>
        </ul>
    </div>
</header>