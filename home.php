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
    <title>BMW</title>
    <link rel="stylesheet" href="home.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>


<body>
    <div class="container">
        <section class="first-page">

            <div class="header">
                <section class="upper-header">
                    <p>Phone No: 12334455</p>
                    <p>Opening Hours: 09:00 AM - 01:00 PM</p>
                </section>
                <section class="lower-header">
                    <div class="logo">
                        <img src="logo.png" alt="Logo">
                        <!-- <p>BMW MOTORING</p> -->
                    </div>
                    <ul class="navbar">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Bikes</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Services</a></li>
                        <li><button class="navbar-contact"><a href="login.php">Log Out</a></button></li>
                    </ul>
                </section>
            </div>
            <div class="content">
                <h1 class="content-heading">Heading</h1>
                <p class="content-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nihil
                    dolorum,
                    impedit voluptates aperiam dolorem eos accusamus consequatur ut dolor facere tenetur voluptatibus ab
                    repudiandae, numquam ea nesciunt suscipit ullam.</p>
                <div class="content-buttons">
                    <button class="main-booking">Book Now</button>
                    <button class="main-testing">Test a ride</button>
                </div>
            </div>
        </section>

</body>

</html>