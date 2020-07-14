<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../r/bootstrap.min.css">
    <link href="../Theme/assets/styles.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

<div class="container">
    <div class="heading justify-content-center text-center">
        <h1>Library Management System </h1>

    </div>
    <div class="login-form justify-content-center col-md-6 offset-md-3">



        <form action="../controller/LoginControll.php" method="post" onsubmit="return valid()">
            <h1>LOGIN PANEL</h1>
            <div class="form-group">
                <select class="custom-select" name="role" required>
                    <option value="">Choose A Category</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="email" name="email" required class="form-control" placeholder="Enter Email" />
            </div>
            <div class="form-group">
                <input type="password" name="password" required class="form-control" placeholder="Enter password" />
            </div>
            <button type="submit" class="btn btn-warning btn-lg">Login Now</button>

            <div class="row foot">
                
                <p class="offset-md-4 col-md-3"><a href="register.php">Register Now</a></p>
            </div>


        </form>
    </div>
</div>

</body>

<script src="../r/jquery.js"></script>
<script src="../r/popper.min.js"></script>
<script src="../r/bootstrap.min.js"></script>
</html>