<?php

    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (!$user & !$pass) {

        echo "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Oops!</strong> Please fill up the fields.</div>";


    } else {

        if (!$user){

            echo "Enter a username";

        } else {
            if (!$pass) {

                echo "Enter a password";

            } else {

                echo "Success";

            }
        }

    }

?>