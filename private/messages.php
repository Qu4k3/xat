<?php

    include 'db_con.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (isset($_POST["send"])){                            
            if (!empty($_POST["inputMessage"])) { 
                
                $sql = "INSERT INTO Messages (text, sender, receiver, created_at) 

                VALUES (
                    '".$_POST["inputMessage"]."',
                    '".$_POST["inputSender"]."',
                    '".$_POST["inputReceiver"]."',
                    sysdate()
                    )";
                
                $conn->query($sql);
            }                           
        }
    }

?>