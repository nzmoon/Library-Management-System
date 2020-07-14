<?php
include_once "../../Model/BorrowBooks.php";
include_once "../../Model/Admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "../head.php";
?>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php include_once "../header.php" ?>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php include_once "../aside.php" ?>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            
            <div class="row">
			
                <div class="col-lg-9 main-chart">

   
  <!-- carousel start -->   
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../Theme/assets/img/la.jpg" alt="Los Angeles" width="1100" height="300">
    </div>
    <div class="carousel-item">
      <img src="../../Theme/assets/img/" alt="" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="../../Theme/assets/img/" alt="" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			  </a>
</div>

  <!-- carousel end -->   


                    <div class="row mt">
					    <p align='center'><font size='5' color="black"><b>Welcome to Port City International University</b></font></p>
                       <p align='justify'><font color="black"><b>Since the establishment, Port City International University has been focusing on assisting the 
					   students in facing the challenges of the ever advancing world. PCIU is a platform where students can
					   rise to the highest level of their capability. It provides an outstanding and supportive environment 
					   for both undergraduate and postgraduate students. A talented and dedicated group of academics provide
					   guidance and tutelage the students need to pursue their research and academic goals. The dynamic 
					   teaching and learning environment of PCIU brims with talent, creativity and international connections. 
					   PCIU has been doing excellent community services by engaging the students and the distinguished 
					   academics in public lectures where the students get the opportunity to exchange and share their 
					   classroom experiences with the invited guest speakers.In PCIU, we maintain a standard quality
					   education and provide the students with proper resources to reach their goals. The university 
					   management has been relentlessly trying to mobilize all the possible resources and logistics
					   needed to ensure quality education and better educational environment. Recruitment of brilliant 
					   teachers and executives, their training and exposure to global standard education are our prime
					   concerns in maintaining quality of education. We have already been able to organize an international 
					   conference on “Quality for Sustainable Development”. Our teachers have had the honor of attending an 
					   international conference in Malaysia and the Vice Chancellor attended a conference on Leadership in 
					   India. All these initiatives have been aimed at achieving a global standard education and improving
					   our academic curricula, teaching and learning methodologies and in the long run research capability.
					   PCIU takes utmost care of its students.Considering the socio-economic condition, promoting and
					   encouraging the students of low and middle income groups, we have kept our tuition fees at minimum 
					   level. We are committed to providing quality education at an affordable cost for all folks of people.
					   We have already created a congenial study friendly campus with all modern facilities including 
					   e-library and sate of the art classrooms and laboratories. PCIU has not only focused on the academic 
					   strength of its students but also on the cultural and sporting activities of the students. We have 
					   different indoor and outdoor games facilities, debating club, cultural forum and robotics club and 
					   some departmental clubs also exist in this university. PCIU campus is also a non-political and 
					   non-smoking campus. This is an equal opportunity university and no one is discriminated or 
					   maltreated because of his/her color, race, religion or nationality. PCIU is pledge-bound to 
					   ensure a student friendly academic environment in the campus and strictly adheres to academic
					   discipline.</font></b></p>


                    </div><!-- /row -->


                   

                    

                </div><!-- /col-lg-9 END SECTION MIDDLE -->


                <!-- **********************************************************************************************************************************************************
                RIGHT SIDEBAR CONTENT
                *********************************************************************************************************************************************************** -->

                <div class="col-lg-3 ds">
                    

                    <!-- CALENDAR-->
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title" style="disadding: none;"></h3>
                                    <div id="date-popover-content" class="popover-content"></div>
                                </div>
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div><!-- / calendar -->

                </div><!-- /col-lg-3 -->
            </div><! --/row -->
        </section>
    </section>

    <!--main content end-->
    <!--footer start-->
    <?php include_once "../footer.php" ?>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<?php include_once "../script.php" ?>


</body>
</html>
