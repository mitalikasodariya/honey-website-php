<?php
    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['admin_name'];

    if (!isset($admin_id)) {
        header('location:login.php');
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    } 
    // adding products to database 
    
    // delete process to database
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        
        mysqli_query($conn,"DELETE FROM `order` WHERE id = '$delete_id' ")or die('query failed');
        header('location:admin_order.php');
        $message[]=  'user removed succesfully';
    }
    // update psymnet status

    if (isset($_POST['update_order'])){
        $order_id = $_POST['order_id'];
        $update_payment = $_POST['update_payment'];

        mysqli_query($conn , "UPDATE `order` SET payment_status = '$update_payment' WHERE  id =' $order_id' ") or die('query faild');

        

    }
    
    
?>    
<style type="text/css">
    <?php
        include 'style.css';
        ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>admin panel</title>
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '
            <div class="message">
                <span>'.$msg.'</span>
                <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
            </div>
            ';
        }
    }
    ?>
      <div class="line4"></div>
<section class="order-container">
    <h1 class="title">total order</h1>
    <div class="box-container">
        <?php
        $select_order = mysqli_query($conn, "SELECT * FROM `order`") or die('query failed');
        if (mysqli_num_rows($select_order) > 0) {
            while($fetch_order = mysqli_fetch_assoc($select_order)) {
                ?>


  <div class="box">               
<p>user name: <span><?php echo $fetch_order['name']; ?></span></p>
<p>user id: <span><?php echo $fetch_order['user_id']; ?></span></p>
<p>placed on: <span><?php echo $fetch_order['placed_on']; ?></span></p>
<p>number: <span> <?php echo $fetch_order['number']; ?></span></p>
<p>email: <span><?php echo $fetch_order['email']; ?></span></p>
<p>total price: <span><?php echo $fetch_order['total_price']; ?></span></p>
<p>method: <span> <?php echo $fetch_order['method']; ?></span></p>
<p>address: <span><?php echo $fetch_order['address']; ?></span></p>
<p>total product: <span> <?php echo $fetch_order['total_products']; ?></span></p>
<form method="post">
<input type="hidden" name="order_id" value="<?php echo $fetch_order['id']; ?>">
<select name="update_payment">

<option disabled selected><?php echo $fetch_order['payment_status']; ?></option>
<option value="Pending">Pending</option>
<option value="Complete">Complete</option>
</select>
<input type ="submit" name="update_order" value="update  payment" class="btn">
<a href="admin_order.php?delete=<?php echo $fetch_order['id']; ?>" onclick="return confirm('Delete this message?');" class="delete">delete</a>

</form>


</div>
                <?php
            }
        } else {
            echo '<div class="empty"> 
                <p>No order placed yet!</p>
            </div>';
        }
        ?>
    </div>
</section>
<div class="line4"></div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
