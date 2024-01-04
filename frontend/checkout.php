<?php
    
    $jsonFilePath = '../adminstrator/dist/json/usercart1.json';

    // Kiểm tra xem tệp JSON có tồn tại hay không
    if (file_exists($jsonFilePath)) {
        // Đọc dữ liệu từ tệp JSON
        $jsonContent = file_get_contents($jsonFilePath);
    
        // Kiểm tra xem tệp JSON có dữ liệu hay không
        if (!empty($jsonContent)) {
            $userCartData = json_decode($jsonContent, true);
            $cartSubtotal = 0; // Thêm biến để tính tổng giá trị
    
            // Hiển thị từng sản phẩm trong giỏ hàng
            foreach ($userCartData as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                // Cập nhật tổng giá trị
                $cartSubtotal += $subtotal;
            }
        } else {
            // Tệp JSON rỗng, set $cartSubtotal = 0
            $cartSubtotal = 0;
        }
    } else {
        // Tệp JSON không tồn tại, set $cartSubtotal = 0 hoặc thực hiện xử lý phù hợp
        $cartSubtotal = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
    
    <title>Checkout Page - DVDTrendy</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

  </head>
  <body>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                </div>
                <div class="col-md-5">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
							<li><a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i> Cart - <?php echo '<span class="cart-amunt">$' . $cartSubtotal . '</span>'; ?>
  </a></li>
                            <?php
                            session_start();
                            // Retrieve the cart subtotal from the session
if (isset($_SESSION['cartSubtotal'])) {
    $cartSubtotal = $_SESSION['cartSubtotal'];
} else {
    // Handle the case when the session variable is not set
    $cartSubtotal = 0;
}
                            ob_start();
    // Kiểm tra xem có session role có giá trị 2 không
    if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
        // Nếu role là 2, ẩn My Account và Login
        echo'<li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>';
    } else {
        // Nếu role không phải là 2, hiển thị My Account và Login
        // echo '<li><a href="register.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>';
        echo '<li><a href="login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>';
    }
    ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

   <div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="shopping-item">
                    <div class="navbar-header">
                        <h1><a href="webpage.php"><img style="width: 165px; height: 50px;" src="img/brand3.png"></a></h1>
                    </div>
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <ul class="nav navbar-nav" >
                        
                        <li class="active"><a href="webpage.php">Home</a></li>
                        <li><a href="ListOfProducts.php">Products</a></li>
                        <li><a href="Offers.php">Offers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="shopping-item">
                    <form action="#">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <!--SIDEBAR HERE-->
                 <?php require('includes/sidebar_webpage.php'); ?>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            

                            <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                <div class="modal-body">
                                  
                                    <form id="checkoutform">
                                        <div class="mb-3">
                                            <label for="addFullName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="addFullName" placeholder="Enter Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="addEmail" placeholder="Enter Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addPhoneNumber" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="addPhoneNumber" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addAddress" class="form-label">Address</label>
                                            <textarea class="form-control" id="addAddress" rows="3" placeholder="Enter Address"></textarea>
                                        </div>
                                        
                                    </form>
                                </div>

                                    

                                </div>

                                <h3 id="order_review_heading">Your order</h3>
<div id="order_review" style="position: relative;">
    <table class="shop_table">
        <thead>
            <tr>
                <th class="product-name">Product</th>
                <th class="product-total">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $jsonFilePath = '../adminstrator/dist/json/usercart1.json';

            if (file_exists($jsonFilePath)) {
                $userCartData = json_decode(file_get_contents($jsonFilePath), true);
                $cartSubtotal = 0;

                foreach ($userCartData as $item) {
                    echo '<tr class="cart_item">';
                    echo '<td class="product-name">';
                    echo $item['title'] . ' <strong class="product-quantity">× ' . $item['quantity'] . '</strong> </td>';
                    echo '<td class="product-total">';
                    $subtotal = $item['price'] * $item['quantity'];
                    echo '<span class="amount">' . $subtotal . '$</span> </td>';
                    echo '</tr>';

                    $cartSubtotal += $subtotal;
                    $discount = $item['discount'];
                }
            }
            ?>
            <script>
                var cartSubtotal = <?php echo $cartSubtotal*(1-($discount/100)); ?>;
                var discount = <?php echo $discount; ?>
            </script>
        </tbody>
        <tfoot>
            <tr class="cart-subtotal">
                <th>Cart Subtotal</th>
                <td><span class="amount"><?php echo $cartSubtotal*(1-($discount/100)); ?>$</span></td>
            </tr>
            <tr class="shipping">
                <th>Shipping and Handling</th>
                <td>Free Shipping</td>
            </tr>
            <tr class="shipping">
                <th>Discount</th>
                <td><span class="amount"><?php echo $discount; ?>%</span></td>
            </tr>
            <tr class="order-discount">
                <th>Order Total</th>
                <td><strong><span class="amount"><?php echo $cartSubtotal*(1-($discount/100)); ?>$</span></strong></td>
            </tr>
        </tfoot>
    </table>
</div>



                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </li>
                                            <img alt="PayPal Acceptance Mark" src="img/payment1.png">
                                               
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="button" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt" onclick="checkout_end(cartSubtotal, discount)">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <?php 
    
    

    require('includes/footer_webpage.php'); ?>
    <!-- Thêm mã JavaScript vào phần đầu của trang HTML của bạn -->
    
    
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    <script src="js/script_page.js"></script>
    
        
  </body>
</html>