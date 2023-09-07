<?php
    session_start();
    include 'connection.php'; // Ensure you have a database connection

    // Check if the user is logged in
    if (!isset($_SESSION['user_name'])) {
        header('location: login.php');
        exit(); // Ensure script termination after redirection
    }

    // Logout logic
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: login.php');
        exit(); // Ensure script termination after redirection
    }

    // Updating quantity
    if (isset($_POST['update_qty_btn'])) {
        $update_qty_id = $_POST['update_qty_id'];
        $update_value = $_POST['update_qty'];

        // Use prepared statements to prevent SQL injection
        $update_query = mysqli_prepare($conn, "UPDATE `cart` SET quantity = ? WHERE id = ?");
        mysqli_stmt_bind_param($update_query, "ii", $update_value, $update_qty_id);
        
        if (mysqli_stmt_execute($update_query)) {
            header('location: cart.php');
            exit(); // Ensure script termination after redirection
        } else {
            die('Update query failed');
        }
    }

    // Delete a product from the cart
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        // Use prepared statements to prevent SQL injection
        $delete_query = mysqli_prepare($conn, "DELETE FROM `cart` WHERE id = ?");
        mysqli_stmt_bind_param($delete_query, "i", $delete_id);

        if (mysqli_stmt_execute($delete_query)) {
            header('location: cart.php');
            exit(); // Ensure script termination after redirection
        } else {
            die('Delete query failed');
        }
    }

    // Delete all products from the cart
    if (isset($_GET['delete_all'])) {
        $user_id = $_SESSION['user_id'];

        // Use prepared statements to prevent SQL injection
        $delete_all_query = mysqli_prepare($conn, "DELETE FROM `cart` WHERE user_id = ?");
        mysqli_stmt_bind_param($delete_all_query, "i", $user_id);

        if (mysqli_stmt_execute($delete_all_query)) {
            header('location: cart.php');
            exit(); // Ensure script termination after redirection
        } else {
            die('Delete all query failed');
        }
    }

    // Fetch cart items
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`") or die('Query failed');
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
    <title>Shopping Cart</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="banner">
        <div class="detail">
            <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Cart</h1>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiudmod tempor.</p> -->
            <a href="index.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Home</a><span>/ Wishlist</span>
        </div>
    </div>
    <div class="line4"></div>

    <!-- Cart Section -->
    <section class="shop">
        <h1 class="title">Products Added in Cart</h1>

        <!-- Display error messages if any -->
        <?php if (isset($message)) : ?>
            <?php foreach ($message as $message) : ?>
                <div class="message">
                    <span><?php echo $message; ?></span>
                    <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="box-container">
            <?php
            $grand_total = 0;

            if (mysqli_num_rows($select_cart) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    ?>
                    <form method="post">
                        <div class="box">
                            <div class="icon">
                                <a href="view_page.php?pid=<?php echo $fetch_cart['pid']; ?>" class="bi bi-eye-fill"></a>
                                <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="bi bi-x"
                                   onclick="return confirm('Do you want to delete this product from your cart')"></a>
                                <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                            </div>

                            <img src="image/<?php echo $fetch_cart['image']; ?>">
                            <div class="price">₹<?php echo $fetch_cart['price']; ?>/-</div>
                            <div class="name"><?php echo $fetch_cart['name']; ?></div>

                            <input type="hidden" name="update_qty_id" value="<?php echo $fetch_cart['id']; ?>">
                            <div class="qty">
                                <input type="number" min="1" name="update_qty" value="<?php echo $fetch_cart['quantity']; ?>">
                                <input type="submit" name="update_qty_btn" value="Update">
                            </div>
                        </div>
                        <div class="total_amt">
                            Total Amount: <span><?php echo $total_amt = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></span>
                        </div>
                    </form>
                    <?php
                    $grand_total += $total_amt;
                }
            } else {
                echo '<p class="empty">No products added yet!</p>';
            }
            ?>
        </div>

        <div class="dlt">
            <a href="cart.php?delete_all" class="btn2" onclick="return confirm('Do you want to delete all items in your cart')">Delete All</a>
        </div>

        <div class="wishlist_total">
            <p>Total Amount Payable: <span>₹<?php echo $grand_total; ?>/-</span></p>
            <a href="shop.php" class="btn">Continue Shopping</a>
            <a href="checkout.php" class="btn">Proceed to Checkout</a>
        </div>
    </section>

    <div class="line2"></div>
    <div class="line4"></div>

    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>
            