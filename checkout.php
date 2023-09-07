<?php
include 'connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location: login.php');
    exit; // Terminate script execution after redirection
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: login.php');
    exit;
}

if (isset($_POST['order_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string(
        $conn,
        'flat no. ' . $_POST['flate'] . ',' . $_POST['street'] . ',' . $_POST['city'] . ',' . $_POST['state'] . ',' . $_POST['country'] . ',' . $_POST['pin']
    );
    $placed_on = date('D-M-Y');
    $cart_total = 0;
    $cart_product = [];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');

    if (mysqli_num_rows($cart_query) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $cart_product[] = $cart_item['name'] . '(' . $cart_item['quantity'] . ')';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(',', $cart_product);

    mysqli_query($conn, "INSERT INTO `order`(`user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`) 
    VALUES ('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');

    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id='$user_id'");

    $message = 'Order placed successfully';
    header('location: checkout.php?message=' . urlencode($message));
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap icon link -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <title>checkout</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="banner">
    <div class="detail">
        <h1>order</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiudmod tempor.</p>
        <a href="index.php">home </a><span>/ order</span>
    </div>
</div>
<div class="line4"></div>
<div class="checkout-form">
    <h1 class="title">Payment Process</h1>
    <?php
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo '
        <div class="message">
            <span>' . $message . '</span>
            <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
        </div>
        ';
    }
    ?>
    <div class="display-order">
        <div class="box-container">

            <?php
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id' ") or die('query failed');
            $grand_total = 0;
            if (mysqli_num_rows($select_cart) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total += $total_price;
                    ?>
                    <div class="box">
                        <img src="image/<?php echo $fetch_cart['image']; ?>">
                        <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
        <span class="grand-total">Total Amount Payable: ₹<?= $grand_total; ?></span>
    </div>
    <div class="line2"></div>
    <div class="line2"></div>

    <div class="form-container">
        <form method="post">
            <div class="input-field">
                <label>your name</label><br>
                <input type="text" name="name" placeholder="enter your name" required>
            </div>
            <div class="input-field">
                <label>your number</label>
                <input type="number" name="number" placeholder="enter your number" required>
            </div>
            <div class="input-field">
                <label>email</label><br>
                <input type="email" name="email" placeholder="enter your email" required>
            </div>
            <div class="input-field">
                <label>select payment method</label>
                <select name="method" required>
                    <option selected disabled>select</option>
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paytm">paytm</option>
                    <option value="paypal">paypal</option>
                </select>
            </div>
            <div class="input-field">
                <label>address </label><br>
                <input type="text" name="flate" placeholder="e.g flate no." required>
            </div>
            <!-- <div class="input-field">
                <label>address line 2</label>
                <input type="text" name="street" placeholder="e.g street name" required>
            </div> -->
            <div class="input-field">
                <label>city</label><br>
                <input type="text" name="city" placeholder="e.g delhi">
            </div>
            <div class="input-field">
                <label>state</label><br>
                <input type="text" name="state" placeholder="e.g new delhi">
            </div>
            <div class="input-field">
                <label>country</label><br>
                <input type="text" name="country" placeholder="e.g India">
            </div>
            <div class="input-field">
                <label>pin code</label><br>
                <input type="text" name="pin" placeholder="e.g 395004">
            </div>
            <input type="submit" name="order_btn" class="btn" value="order now">
        </form>
    </div>
</div>
<div class="line2"></div>

<?php include 'footer.php'; ?>

<script type="text/javascript" src="script.js"></script>
</body>
</html>
