<?php
    $db_name = "registration";
    $db_server = "localhost";
    $db_password = "";
    $db_user = "root";
    
    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    
    if($conn){ 
?>
    <!-- <script>alert("/success")</script> -->
    <?php
    }else{
            ?>
            <!-- <script>alert("failed to connect")</script> -->
            <?php
    }
?>