<?php
    session_start();
    if(!isset($_SESSION['username'])){
        echo "You are logged out";
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <div class="container">
        <h1>Home Page</h1>
        <h2>Hello <span style="text-decoration: underline; text-transform: uppercase; font-style:italic;"><?php echo $_SESSION['username']; ?> </span> Welcome Back!!</h2>
        <button type="button"> <a href="logout.php" style="text-decoration: none; color: black;"> Log Out </a></button>
    </div>
</body>
</html>