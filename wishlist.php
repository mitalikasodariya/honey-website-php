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
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }

  //adding product in cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image']; 
        $product_quantity = 1; 
        $user_id = $_SESSION['user_id'];

         $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id' ") or die('query failed');
         if(mysqli_num_rows($cart_num)>0){
            $message[]='product already exist in cart';
         }else{
            mysqli_query($conn, "INSERT INTO `cart` (`user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')");
            $message[]='product successfuly added in your cart';
        }
     }
     // delete product from wishlist
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
       
        mysqli_query($conn,"DELETE FROM `wishlist` WHERE id = '$delete_id' ")or die('query failed');
        header('location:wishlist.php');
    }

    // delete product from wishlist
    if(isset($_GET['delete_all'])){
    $user_id = $_SESSION['user_id'];

    mysqli_query($conn,"DELETE FROM `wishlist` WHERE user_id = '$user_id'")or die('query failed');
    header('location:wishlist.php');
}

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap icon link -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet"  href="main.css">
        <title>wishlist</title>
    </head>
<body>
<?php include 'header.php';  ?>

    <div class="banner">    
    <div class="detail">
        <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspmy wishlist</h1>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiudmod tempor.</p> -->
        <a href="index.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsphome </a><span>/ wishlist</span>
    </div>
</div>
<div class="line4"></div>
<!-- ----------------wishlist------------------- -->
    <section class="shop">
        <h1 class="title">Products added in wishlist</h1>
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

    <div class="box-container">
        <?php
        $grand_total=0;
            $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist`") or die('Query failed');
            if (mysqli_num_rows($select_wishlist) > 0) {
                while ($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)) {
        ?>
     <form method="post" class="box">
        <img src="image/<?php echo $fetch_wishlist['image']; ?>">
        <div class="price">₹<?php echo $fetch_wishlist['price']; ?>/-</div>
        <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
        <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['pid']; ?>">
        <input type="hidden" name="product_name" value="<b><?php echo $fetch_wishlist['name']; ?></b>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
        <div class="icon">
            <a href="view_page.php?pid=<?php echo $fetch_wishlist['pid']; ?>" class="bi bi-eye-fill"></a>
            <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="bi bi-x" onclick="return confirm('do you want to delete this product from your wishlist')"> </a>
            <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
        </div>
    </form>

        <?php 
                $grand_total+=$fetch_wishlist['price'];
            }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }
        ?>
    </div>
        <div class="wishlist_total">
            <p>total amount payable : <span>₹<?php echo $grand_total; ?>/-</span></p>
            <a href="shop.php" class="btn">continue shoping</a>
            <a href="wishlist.php?delete_all" class="btn <?php echo ($grand_total)?'':'disabled'?>" onclick="return confirm('do you want to delete all items in your wishlist')">delete all</a>
            
        </div>
        </section>
        <!-- <div class="line2"></div>
        <div class="line4"></div> -->


    <?php include 'footer.php';  ?>

   <script type="text/javascript" src="script.js"></script>
</html>