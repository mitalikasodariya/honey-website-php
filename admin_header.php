<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <header class="header">
    <div class="flex">
        <a href="admin_pannel.php" class="logo"><img src="image/35.png" width="90px" height="90px"></a>
        <nav class="navbar">
            <a href="admin_pannel.php">home</a>
            <a href="admin_product.php">products</a>
            <a href="admin_order.php">orders</a>
            <a href="admin_user.php">users</a>
            <a href="admin_message.php">messages</a>
        </nav>
        <div class="icons">
            <i class="bi bi-person" id="user-btn"></i>
            <i class="bi bi-list" id="menu-btn"></i>
        </div>
        <div class="user-box">
            <p>username: <span><?php echo $_SESSION['admin_name']; ?></span></p>
            <p>email: <span><?php echo $_SESSION['admin_email']; ?></span></p>
            <form method="post">
                <button type="submit" name="logout" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
</header>
<div class="banner">
    <div class="detail">
        <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp admin dashboard</h1>
       
    </div>
</div>
<div class="line4"></div>

<script type="text/javascript" src="script.js"></script>

<script type="text/javascript" src="script2.js"></script>
<script type="text/javascript" src="slick.js"></script>
</body>
</html>