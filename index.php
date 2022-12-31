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
</head>

<body>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
        <div class="register-container">
            <label for="usernameId">UserName: </label>
            <input type="text" id="usernameId" name="username" required>
            <label for="emailId">Email: </label>
            <input type="email" id="emailId" name="email" required>
            <label for="contactId">Contact: </label>
            <input type="text" id="contactId" name="contact" required>
            <label for="passwordId">Password: </label>
            <input type="password" id="passwordId" name="password" required>
            <label for="cpasswordId">Confirm Password: </label>
            <input type="password" id="cpasswordId" name="cpassword" required>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>

</body>

</html>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>