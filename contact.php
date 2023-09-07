<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit; // Terminate script execution after redirection
}

$user_id = $_SESSION['user_name'];

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit-btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $user_id = $_SESSION['user_id'];

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id ='$user_id' AND  name='$name' AND email='$email' AND number='$number' AND message='$message'") or die('Query failed');

    if (mysqli_num_rows($select_message) > 0) {
        echo 'Message already sent.';
    } else {
        mysqli_query($conn, "INSERT INTO `message` (`user_id`, `name`, `email`, `number`, `message`) VALUES ('$user_id', '$name', '$email', '$number', '$message')") or die('Query failed');
        echo 'Message sent successfully.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap icon link -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="main.css">
    <title>contact</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="banner">
    <div class="detail">
        <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspContact</h1>

        <a href="index.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Home</a><span>/ Contact</span>
    </div>
</div>
<div class="line4"></div>

<!-- Contact Form -->
<div class="line2"></div>
<div class="form-container">
    <h1 class="title">Leave a Message</h1>
    <form method="POST">
        <div class="input-field">
            <label>Your Name</label><br>
            <input type="text" name="name" required>
        </div>

        <div class="input-field">
            <label>Your Email</label><br>
            <input type="email" name="email" required>
        </div>

        <div class="input-field">
            <label>Number</label><br>
            <input type="number" name="number" required>
        </div>

        <div class="input-field">
            <label>Your Message</label><br>
            <textarea name="message" required></textarea>
        </div>

        <button type="submit" name="submit-btn">Send Message</button>
    </form>
</div>
<div class="line"></div>
<div class="line2"></div>

<!-- Address -->
<div class="address">
    <h1 class="title">Our Contact</h1>
    <div class="row">
        <div class="box">
            <i class="bi bi-map-fill"></i>
            <div>
                <h4>Address</h4>
                <p>74, Trupti Soc, Ved Road, Surat.395004</p>
            </div>
        </div>

        <div class="box">
            <i class="bi bi-telephone-fill"></i>
            <div>
                <h4>Phone</h4>
                <p>8140551854</p>
            </div>
        </div>    

         <div class="box">
            <i class="bi bi-envelope-fill"></i>
            <div>
                <h4>Email</h4>
                <p>mittu.kasodariya163@gmail.com</p>
            </div>
        </div>        
    </div>
</div>
<div class="line2"></div>
<?php include 'footer.php'; ?>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
