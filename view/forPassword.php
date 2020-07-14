<?php
if (!isset($_SESSION)) session_start();

include_once "../Model/Student.php";
include_once "../Model/Teacher.php";

//var_dump($_SESSION);
//die();
if ($_SESSION['role'] == "Student"){
    $std = new Student();
    $data=$std->view($_SESSION['std_id']);
}
else if ($_SESSION['role'] == "Teacher"){
    $tec = new Teacher();
    $data = $tec->view($_SESSION['teachers_id']);
}
else{
    echo "failed";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../Theme/assets/styles.css" rel="stylesheet">
    <title>Change Password</title>
</head>
<body>

<div class="container">
    <div class="heading justify-content-center text-center">
        <h1>Library Management System </h1>
        <span>AN AUTOMATED MANAGEMENT SYSTEM</span>
    </div>
    <div class="login-form justify-content-center col-md-6 offset-md-3">
        <form action="../controller/SetAccount.php" method="post" onsubmit="return check()">
            <h1>Register Info</h1>
            <div class="form-group">
                <input type="text" name="name" class="form-control" disabled value="<?php echo $data['full_name']?>">
            </div>
            <div class="form-group">
                <input type="text" name="id" class="form-control" disabled value="<?php echo $data['u_id']?>">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" disabled value="<?php echo $data['email']?>">
            </div>
            <div class="form-group">
                <input type="password" name="password" required class="form-control" id="pass1" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <input type="password" name="password1" required class="form-control" id="pass2" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <p id="msg"  style="display: none; color: rgba(255,41,28,0.97)">Those Password don't match..</p>
            </div>
            <button type="submit" class="btn btn-warning btn-lg">Register</button>
            
            <script>
                function check() {
                    if (document.getElementById("pass1").value != document.getElementById("pass2").value){
                        var showmsg = document.getElementById("msg");
                        showmsg.style.display="block";
                        return false;
                    }
                    else{
                        return true;
                    }
                }
            </script>
        </form>
    </div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>