 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

    
    <title>User Panel</title>
</head>
<body>
   <header class="header">
    <div class="flex">
    <a href="index.php"class="logo"><img src="image/35.png" width="90px" height="90px"></a>
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
        </nav>
        <div class="icons">
    <i class="bi bi-person"  id="user-btn"></i>
    <!-- <h1>hello</h1> -->
    <?php
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id='$user_id'") or die('query failed');
    $wishlist_num_rows = mysqli_num_rows($select_wishlist);
    ?>
    <a href="wishlist.php">
        <i class="bi bi-heart"></i>
        <sup><?php echo $wishlist_num_rows; ?></sup>
    </a>

    <?php
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id' ") or die('query failed');
    $cart_num_rows = mysqli_num_rows($select_cart);
    ?>
    <a href="cart.php">
        <i class="bi bi-cart"></i>
        <sup><?php echo $cart_num_rows; ?></sup>
    </a>
    <i class="bi bi-list" id="menu-btn"></i>
</div>
<div id="aa" class="user-box">
    <p>Username: <span><?php echo $_SESSION['user_name']; ?></span></p>
    <p>Email: <span><?php echo $_SESSION['user_email']; ?></span></p>
    <form method="post">
        <button type="submit" name="logout" class="logout-btn">Logout</button>
    </form>
</div>
</div>

</header>

<script type="text/javascript" src="script.js"></script>

<script type="text/javascript" src="script2.js"></script>
<script type="text/javascript" src="slick.js"></script>
</body>
</html>
