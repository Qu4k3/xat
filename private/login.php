<?php

session_start();
if (isset($_SESSION["user"])){
    header("location:../index.php");
}

?>

<!doctype html>
<!--suppress ALL -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/b.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="post">
                <br><br>
                <h1><p class="text-center">Login</p></h1>
                <br><br>
                <span id="result"></span>
                <div class="form-group">
                    <label for="user">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <input type="button" name="login" id="login" value="Login" class="btn btn-default">
                </div>

            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align: center;">
            
                <br>or<br><br>
                
                <a class="btn btn-success" role="button" href="register.php">Register</a>
            
        </div>
    </div>
</div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/b.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>
</html>


