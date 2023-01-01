<?php 
    session_start();
?>

<?php
include("db_conn.php");
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $password =  mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailQuery = "select * from register where email='$email'";
    $query = mysqli_query($conn, $emailQuery);
    $emailCount = mysqli_num_rows($query);
    $usernameQuery = "select * from register where username='$username'";
    $query = mysqli_query($conn, $usernameQuery);
    $usernameCount = mysqli_num_rows($query);

    if ($usernameCount > 0) {
        echo "The username is taken";
    } else {
        if ($emailCount > 0) {
            echo "The email is use enter another email";
        } else {
            if ($password === $cpassword) {
                $insertQuery = "INSERT INTO register(USERNAME, EMAIL, CONTACT, PASSWORD, C_PASSWORD) VALUES ('$username', '$email', '$contact', '$pass', '$cpass')";
                $query = mysqli_query($conn, $insertQuery);
                header('location:login.php');
                echo "Successfully registered";
            } else {
                echo "Password did not match";
            }
        }
    }
}

// header('location:home.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="index.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">

        <div class="register-container">
            <p class="header">Register</p>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
            <input type="text" id="usernameId" name="username" placeholder="Username" required>
            <input type="email" id="emailId" name="email" placeholder="Email" required>
            <input type="text" id="contactId" name="contact" placeholder="Contact" required>
            <input type="password" id="passwordId" name="password" placeholder="Password" required>
            <input type="password" id="cpasswordId" name="cpassword" placeholder="Confirm Password" required>
            <button type="submit" name="submit">Submit</button>
        </form>
        
    </div>
</div>

</body>

</html>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>