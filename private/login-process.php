<?php

session_start();
$conn = mysqli_connect("localhost","root","","xat_db");

if(isset($_POST["username"]) && isset($_POST["password"])){
    $user = mysqli_real_escape_string($conn, $_POST["username"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT username FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result);
    if ($num_row == "1") {
        $data = mysqli_fetch_array($result);
        $_SESSION["user"] = $data["username"];
        echo "1";
    } else {
        echo "error";
    }
} else {
    echo "error";
}

?>
