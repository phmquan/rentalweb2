<?php
    $jsonFilePath = '../adminstrator/dist/json/usercart.json';

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

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <!--SIDEBAR HERE-->

                <?php require('includes/sidebar_webpage.php'); ?>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                        <?php
                        // cart.php

                        // Đường dẫn đầy đủ đến tệp JSON usercart
                        $jsonFilePath = '../adminstrator/dist/json/usercart.json';
                        // Kiểm tra xem tệp JSON có tồn tại hay không
                        if (file_exists($jsonFilePath)) {
                          // Đọc dữ liệu từ tệp JSON
                          $userCartData = json_decode(file_get_contents($jsonFilePath), true);

                          // Kiểm tra xem có dữ liệu trong tệp không
                          if (!empty($userCartData)) {
                            echo '<h2 style="color:#5a88ca">CART DETAILS</h2>';
                            echo '<form method="post" action="#">';
                            echo '<table cellspacing="0" class="shop_table cart">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th class="product-remove">&nbsp;</th>';
                            echo '<th class="product-thumbnail">&nbsp;</th>';
                            echo '<th class="product-name">Product</th>';
                            echo '<th class="product-price">Price</th>';
                            echo '<th class="product-quantity">Quantity</th>';
                            echo '<th class="product-subtotal">Total</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            $cartSubtotal = 0; // Thêm biến để tính tổng giá trị

                            foreach ($userCartData as $item) {
                                echo '<tr class="cart_item">';
                                echo '<td class="product-remove">';
                                echo '<a title="Remove this item" class="remove" href="#">×</a>';
                                echo '</td>';
                                echo '<td class="product-thumbnail">';
                                // Thêm hình ảnh sản phẩm nếu có
                                if (isset($item['productImage'])) {
                                    echo '<img width="200px" height="200px" alt="' . $item['title'] . '" class="shop_thumbnail" src="' . $item['productImage'] . '" />';
                                }
                                echo '</td>';
                                echo '<td class="product-name">';
                                echo '<a href="#">' . $item['title'] . '</a>';
                                echo '</td>';
                                echo '<td class="product-price">';
                                echo '<span class="amount">' . $item['price'] . '$</span>';
                                echo '</td>';
                                echo '<td class="product-quantity">';
                                echo '<div class="quantity buttons_added">';
                                echo '<input type="button" class="minus" value="-" />';
                                echo '<input type="number" size="4" class="input-text qty text" title="Qty" value="' . $item['quantity'] . '" min="0" step="1" />';
                                echo '<input type="button" class="plus" value="+" />';
                                echo '</div>';
                                echo '</td>';
                                echo '<td class="product-subtotal">';
                                $subtotal = $item['price'] * $item['quantity'];
                                echo '<span class="amount">' . $subtotal . '$</span>';
                                echo '</td>';
                                echo '</tr>';

                                // Cập nhật tổng giá trị
                                $cartSubtotal += $subtotal;
                                }

                                echo '<tr>';
                                echo '<td class="actions" colspan="6">';
                                echo '<div class="coupon">';
                                echo '<label for="coupon_code">Coupon : </label>';
                                echo '<input type="text" placeholder="Enter code" value="" id="coupon_code" class="input-text" name="coupon_code" />';
                                echo '<input  type="submit" value="Apply Coupon" name="apply_coupon" class="button" />';

                                echo '</div>';
                                require_once('./model/config_webpage.php');
                                 // Xử lý khi nhấn "Apply Coupon"
                                 if (isset($_POST['apply_coupon'])) {
                                    $couponCode = $_POST['coupon_code'];
                                    
                                    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

                                    // Kiểm tra kết nối
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }
                                    // Truy vấn để lấy thông tin về mã offer từ database
                                    $query = "SELECT * FROM OFFER WHERE code = '$couponCode'";
                                    $result = $conn->query($query);
    
                                    if ($result->num_rows > 0) {
                                    // Mã offer hợp lệ, tính tổng giá trị mới
                                    $row = $result->fetch_assoc();
                                    $discountPercentage = $row['discount_percentage'];
                                    $discountMultiplier = 1 - ($discountPercentage / 100);
    
                                    $cartSubtotal *= $discountMultiplier;
    
                                    echo '<p class="coupon-applied">Coupon applied successfully! Discount: ' . $discountPercentage . '%</p>';

                                    // store discount for checkout here
                                    // Đọc dữ liệu từ tệp JSON hiện tại
                                    $jsonFilePathCart = '../adminstrator/dist/json/usercart1.json';
                                    $currentData = file_exists($jsonFilePathCart) ? json_decode(file_get_contents($jsonFilePathCart), true) : [];

                                    // Cập nhật biến discount trong mảng JSON
                                    foreach ($currentData as &$item) {
                                        $item['discount'] = $discountPercentage;
                                    }

                                    // Ghi dữ liệu vào tệp JSON
                                    file_put_contents($jsonFilePathCart, json_encode($currentData, JSON_PRETTY_PRINT));

                                    } else {
                                    // Mã offer không hợp lệ
                                    echo '<p class="coupon-error">Invalid coupon code. Please try again.</p>';
                                    }
                                }

                                /// Nút Checkout với thẻ <button> và form action
    
                                echo '<button style="margin-left: 20px;" type="button" class="button" name="calc_shipping" value="1" onclick="checkout(cartSubtotal)">Checkout</button>'; 


                                echo '<script>
                                
                                </script>';
                                


                                echo '</div>';

                          

                                echo '</td>';
                                echo '</tr>';

                                echo '</tbody>';
                                echo '</table>';
                                echo '</form>';
                                

                               

                                // Hiển thị Cart Subtotal
                                // Hiển thị Cart Totals dưới dạng bảng
                                echo '<div class="cart_totals" >';
                                echo '<h2 style="color:#5a88ca" >CART TOTALS</h2>';
                                echo '<table cellspacing="0">';
                                echo '<tbody>';
                                echo '<tr class="cart-subtotal">';
                                echo '<th>Cart Subtotal</th>';
                                echo '<td><span class="amount">' . $cartSubtotal . '$</span></td>';
                                echo '</tr>';
                                echo '<tr class="shipping">';
                                echo '<th>Shipping and Handling</th>';
                                echo '<td>Free Shipping</td>';
                                echo '</tr>';
                                echo '<tr class="order-total">';
                                echo '<th>Order Total</th>';
                                echo '<td><strong><span class="amount">' . $cartSubtotal . '$</span></strong></td>';
                                echo '</tr>';
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';


                          } else {
                              echo '<a href = "login.php" style="margin-left : 100px">
                                      <h1>Giỏ hàng của bạn đang trống</h1>
                                      <h1>bạn cần đăng nhập.</h1>
                                    </a>
                                    '; }
                              
                          } else {
                            echo 'Không tìm thấy tệp JSON.';
                          }
                        
    

                        ?>
                        <script>
                            var cartSubtotal = <?php echo $cartSubtotal; ?>;
                        </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require('includes/footer_webpage.php'); ?>

        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>

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
</body>

</html>