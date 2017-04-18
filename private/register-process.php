<?php

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "", "xat_db");
    $query = mysqli_query($conn, "SELECT id FROM users WHERE username=$user");


    if (!$user & !$pass) 
    {
        echo "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Oops!</strong> Please fill up the fields.</div>";
    } 
    else
        if (!$user)
        {
            echo "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You forgot to enter a <strong>username</strong>.</div>";
        }
        else
            if (!$user == 1) 
            {
                echo "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>Username <strong>".$user."</strong> is already taken.</div>";
            }
            else
                if (!$pass)
                {
                    echo "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You forgot to enter a <strong>password</strong>.</div>";
                }
                else
                {
                    echo "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Register successful</strong>, you can now <a href='login.php'>Login</a>.</div>";
                    mysqli_query($conn, "INSERT INTO users (username, password, avatar) VALUES ('$user', '$pass', 'default.png')");
                    
                }

?>