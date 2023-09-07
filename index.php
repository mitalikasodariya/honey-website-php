<?php
    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['user_name'];

    if (!isset($admin_id)) {
        header('location:login.php');
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }
    //adding product in wishlist
    if (isset($_POST['add_to_wishlist'])) {
      
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image']; 
        $user_id = $_SESSION['user_id'];

         $wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
         $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id' ") or die('query failed');
         if(mysqli_num_rows($wishlist_number)>0){
            $message[]='product already exist in wishlist';
         }else if(mysqli_num_rows($cart_num)>0){
            $message[]='product already exist in cart';
         }else{
            mysqli_query($conn, "INSERT INTO `wishlist` (`user_id`, `pid`, `name`, `price`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')");
            $message[]='product successfuly added in your wishlist';
        }
     }

  //adding product in cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image']; 
        $product_quantity = $_POST['product_quantity']; 
        $user_id = $_SESSION['user_id'];

         $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id' ") or die('query failed');
         if(mysqli_num_rows($cart_num)>0){
            $message[]='product already exist in cart';
         }else{
            mysqli_query($conn, "INSERT INTO `cart` (`user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')");
            $message[]='product successfuly added in your cart';
        }
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
    <link rel="stylesheet" href="main.css">
    
    <title>Home</title>
</head>
<body>
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

    <div class="banner">

<div class="detail">
    <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp User Dashboard</h1>
   
    
</div>

</div>
    <!-------------------home slider--------------------------->
  <div class="container-fluid">
    <div class="hero-slider">
        <div class="slider-item">
        <img src="image/42-removebg-preview.png">
            <div class="slider-caption">
                <span>Test The Quality</span>
                <h1>Organic Premium Honey</h1>
                <p>Enjoy sweet aromatic honey made from ecologically clean raw materials in the purest environment!</p>
                <a href="shop.php" class="btn">Shop Now</a>
            </div>
        </div>
      
        <div class="slider-item">
            <img src="image/40-removebg-preview.png">
            <div class="slider-caption">
                <span>Test The Quality</span>
                <h1>Organic Premium Honey</h1>
                <p>Enjoy sweet aromatic honey made from ecologically clean raw materials in the purest environment!</p>
                <a href="shop.php" class="btn">Shop Now</a>
            </div>
        </div>
    </div>
        <i class="bi bi-chevron-left prev"></i>
        <i class="bi bi-chevron-right next"></i>
    </div>
</div>
<!-------------- services---------------- -->
<div class="services">
    <div class="row">
        <div class="box">
            <img src="image/free.jpeg">
            <div>
                <h1>Free Shipping Fast</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="box">
            <img src="image/100.png">
            <div>
                <h1>Money Back & Guarantee</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="box">
        <img src="image/online.jpeg">
            <div>
                <h1>Online Support 24/7</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
    </div>
</div>
</div>
<!-------------------story------------------------->
    <div class="story">
        <div class="row">
            <div class="box">
                <span>our story</span>
                <h1>Producation of natural honey since 1990</h1>
                <p>Gujarat is the second-largest honey-producing state in India, accounting for around 15% of the country's honey production. 
                The state is known for its high-quality honey, with the major honey-producing districts being Kheda, Anand, and Vadodara. 
                The honey produced in Gujarat is primarily multi-floral honey, with a distinct flavor and aroma.</p>
                <a href="shop.php" class="btn">shop now</a>
            </div>
            <div class="image/1.jpg">
            </div>
        </div>
    </div>

        <!--------------------testimonial------------------->
            <!-- <div class="line4"></div>             -->

            <div class="testimonial-slider">
    <h1 class="title">What Our Customers Say</h1>
    <div class="testimonial-items">
        <div class="testimonial-item">
            <img src="image/42.jpeg">
            <div class="testimonial-caption">
                <span>Test The Quality</span>
                <h2>Organic Premium Honey</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

        <div class="testimonial-item">
            <img src="image/43.jpeg">
            <div class="testimonial-caption">
                <span>Test The Quality</span>
                <h2>Organic Premium Honey</h2>
                <p>"Good quality and service unbeatable Highly recommended!" 
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

        <div class="testimonial-item">
            <img src="image/images.jpeg">
            <div class="testimonial-caption">
                <span>Test The Quality</span>
                <h2>Organic Premium Honey</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>

    <div class="controls">
        <i class="bi bi-chevron-left prev1"></i>
        <i class="bi bi-chevron-right next1"></i>
    </div>
</div>

<!------------------discover section---------------------->
<div class="discover">
    <div class="detail">
        <h1 class="title"> Organic Honey Be Healthy</h1>
        <span>Buy Now Save 30% off!</span>
        <p>30% Instant Discount up to INR 250 on HSBC Cashback Card Credit Card Transactions. Minimum purchase value INR 1000
        Get GST invoice and save up to 28% on business purchases.</p>
    </br>
        <a href="shop.php" class="btn">discover now</a>
    </div>
    <div class="img-box">
        <img src="image/53-removebg-preview.png">
    </div>
</div>
<!-- <div class="line3"></div> -->

<!------------------items list---------------------->
<?php include 'homeshop.php'; ?>

<!------------------newslatter---------------------->
<div class="newslatter">
    <h1 class="title">Join Our To Newslatter</h1>
    <p>Get 15% off your next order. Be the first to learn about promotions special events, new arrivals and more.</p>
    <input type="text" name="" placeholder="your Email Address....">
    <button><b>subscribe now</b>
    </button>
</div>
<div class="line2"></div>

<!------------------bee image---------------------->
<div class="client">
    <div class="box">
        <img src="image/8.jpg">
    </div>
    <div class="box">
        <img src="image/9.jpg">
    </div>
    <div class="box">
        <img src="image/11.jpg">
    </div>
    <div class="box">
        <img src="image/10.jpg">
    </div>
    <div class="box">
        <img src="image/13.png">
    </div>
</div>

<?php include 'footer.php'; ?>
   <script src="jquary.js"></script>
   <script src="slick.js"></script>

    <!-- -----------------slick slider link------------------------- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
   <script type="text/javascript" src='script2.js'?></script>
   
<script type="text/javascript" src="script.js"></script>

   <script type="text/javascript" src="slick.js"></script>
</html>