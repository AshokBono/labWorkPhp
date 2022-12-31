<?php
session_start();
?>

<?php
include "db_conn.php";
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $emailQuery = "SELECT * FROM register where email = '$email'";
    $query = mysqli_query($conn, $emailQuery);
    $emailCount = mysqli_num_rows($query);

    if ($emailCount > 0) {
        $emailPass = mysqli_fetch_assoc($query);
        $dbPass = $emailPass["PASSWORD"];
        $passDecode = password_verify($password, $dbPass);
        $_SESSION['username'] = $emailPass["USERNAME"];
        echo $_SESSION['username'];

        if ($passDecode) {
            header('location:home.php');
        } else {
            echo "Incorrect Password";
        }
    } else {
        echo "Incorrect Email";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">

        <form action="" method="POST">
            <h3>Login</h3>
            <label for="emailId">Email: </label>
            <input type="email" id="emailId" name="email" required placeholder="example@exp.com">
            <label for="passwordId">Password: </label>
            <input type="password" id="passwordId" name="password" required>
            <input type="submit" name="submit">
        </form>
    </div>
</body>

</html>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>