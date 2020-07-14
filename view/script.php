<?php include_once "templateurl.php" ?>

<script src="<?php echo url?>assets/js/jquery.js"></script>
<script src="<?php echo url?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo url?>assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo url?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo url?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo url?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo url?>assets/js/jquery.sparkline.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>


<!--common script for all pages-->
<script src="<?php echo url?>assets/js/common-scripts.js"></script>

<script type="text/javascript" src="<?php echo url?>assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?php echo url?>assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="<?php echo url?>assets/js/sparkline-chart.js"></script>
<script src="<?php echo url?>assets/js/zabuto_calendar.js"></script>


<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", }
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>