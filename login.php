<?php
include 'connection.php';
session_start();

// Initialize the $message array
$message = array();

if (isset($_POST['submit-btn'])) {
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $select_user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ") or die('Query failed');

    if (mysqli_num_rows($select_user) > 0) {
        $row = mysqli_fetch_assoc($select_user);
        if ($row['password'] == $password) {
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_password'] = $row['password'];
                header('location: admin_pannel.php');
                exit();
                
            } else if ($row['user_type'] == 'user') {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_password'] = $row['password'];
                header('location: index.php');
                exit();
            }
        }
    }

    // If the execution reaches this point, it means the email or password is incorrect
    $message[] = 'Incorrect email or password';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
            </div>
            ';
        }
    }
    ?>
    <section class="form-container1">
        <form method="post"> 
            <h1>Login Page</h1>
            <div class="input-field">
            <label>your email </label></br>
            <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="input-field">
            <label>your password </label>
            <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            
             <input type="submit" name="submit-btn" value="Login" class="btn">
            <p>create a new account? <a href="register.php">Register now</a></p>
        </form>
    </section>
</body>
</html>