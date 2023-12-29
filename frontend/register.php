<?php
    include "./model/user.php";
    if(isset($_POST["register"]) && $_POST["register"]){
        if (empty($_POST["billing_full_name"]) || empty($_POST["billing_date_of_birth"]) || empty($_POST["billing_address"]) || empty($_POST["billing_email"]) || empty($_POST["billing_username"]) || empty($_POST["billing_phone"]) || empty($_POST["account_password"])) {
            $txt_notification = "Vui lòng điền đầy đủ thông tin vào các trường bắt buộc.";
        } else {
            $conn=connectdb();
            $fullName = $_POST['billing_full_name'];
            $dateOfBirth = $_POST['billing_date_of_birth'];
            $address = $_POST['billing_address'];
            $email = $_POST['billing_email'];
            $username = $_POST['billing_username'];
            $phone = $_POST['billing_phone'];
            $password = $_POST['account_password'];
        
    
            // Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
            $query = "INSERT INTO user (fullname, dayofbirth, address, email, account, PhoneNumber, password, role_id) 
              VALUES ('$fullName', '$dateOfBirth', '$address', '$email', '$username', '$phone', '$password','2')";
    
            if ($conn->query($query) === TRUE) {
                // Nếu truy vấn thành công, hiển thị thông báo
                $txt_notification= "Thông tin của bạn đã được lưu thành công.";
            } else {
                // Nếu truy vấn thất bại, hiển thị thông báo lỗi
                $txt_notification= "Lỗi: " . $conn->error;
            }
        }
       
}
?>
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
				<h1><a href="webpage.php">DVDTrendy</a></h1>
				</div>
				<div class="navbar-header">
				<a class="navbar-brand" href="#"></a>				
				</div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="webpage.php">Home</a></li>
                        <li><a href="ListOfProducts.php">List Of Product</a></li>
                        <li><a href="Offers.php">Offers</a></li>
                    </ul>
                
				</div>
				</div>
                <div class="col-sm-5">
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
                        <h2>Register Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">                
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-7.jpg" class="recent-thumb" alt="">
                            <h2>The Legend of Tarzan</h2>
                                <div class="product-carousel-price">
                                    <ins>$28.9</ins> <del>$49.4</del>
                                </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-8.jpg" class="recent-thumb" alt="">
                            <h2>Shutter Island</h2>
                                <div class="product-carousel-price">
                                    <ins>$9.4</ins> <del>$12.5</del>
                                </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-9.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">The Raid Redemption</a></h2>
                                <div class="product-carousel-price">
                                    <ins>$12</ins> <del>$22.5</del>
                                </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-10.jpg" class="recent-thumb" alt="">
                            <h2>The Fault in Our Stars</h2>
                                <div class="product-carousel-price">
                                    <ins>$22</ins> <del>$35.5</del>
                                </div>                            
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Big Mommas</a></li>
                            <li><a href="">The Angry Birds Movie</a></li>
                            <li><a href="">The Mechanic</a></li>
                            <li><a href="">Alvin and The Chipmunks</a></li>
                            <li><a href="">The Eagle</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Fill Your Detail Information</h3>
                                            
                                            <p id="billing_full_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_full_name">Full Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="John Doe" id="billing_full_name" name="billing_full_name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_day_of_birth_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">Date Of Birth</label>
                                                <input type="text" value="" placeholder="YYYY-MM-DD" id="billing_date_of_birth" name="billing_date_of_birth" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address">Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="address" id="billing_address" name="billing_address" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="abc@example.com" id="billing_email" name="billing_email" class="input-text ">
                                            </p>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_user_name">Username <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="username" id="billing_username" name="billing_username" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="123456789" id="billing_phone" name="billing_phone" class="input-text ">
                                            </p>
                                            <div class="clear"></div>


                                            <div class="create-account">
                                                <p id="account_password_field" class="form-row validate-required">
                                                    <label class="" for="account_password">Account password <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="password" value="" placeholder="Password" id="account_password" name="account_password" class="input-text">
                                                </p>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                     if(isset($txt_notification)&&($txt_notification!="")){
                                     echo "<font color='red'>".$txt_notification."</font>";
                                }
                                 ?>

                                <div id="order_review" style="position: relative;">
                                    
                                    <div id="payment">
                                        <div class="form-row place-order">
                                            <input type="submit" data-value="Place order" value="Submit" id="place_order" name="register" class="button alt">
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


<?php include "./includes/footer_webpage.php"?>
   
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
  </body>
</html>