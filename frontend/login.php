<?php
  session_start();
  ob_start();

  function saveUserToJson($userData) {
    $jsonFilePath = '../adminstrator/dist/json/user_data.json';

    // Đọc dữ liệu từ file JSON hiện tại (nếu có)
    $currentData = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];

    // Thêm dữ liệu người dùng mới vào mảng
    $currentData[] = $userData;

    // Ghi dữ liệu vào file JSON
    file_put_contents($jsonFilePath, json_encode($currentData, JSON_PRETTY_PRINT));
  }


  include "./model/user.php";
  if (isset($_POST['login']) && $_POST['login']) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = checkuser($username, $password);
    // Kiểm tra xem tệp có tồn tại không trước khi xóa nội dung
    // Mở tệp JSON với quyền ghi
    $jsonFilePath = '../adminstrator/dist/json/user_data.json';
    $jsonFilePath1 = '../adminstrator/dist/json/usercart.json';
    $jsonFilePath12 = '../adminstrator/dist/json/usercart1.json';
    $jsonFilePath13 = '../adminstrator/dist/json/profile.json';
    $file = fopen($jsonFilePath, 'w');
    $file1 = fopen($jsonFilePath1, 'w');
    $file2 = fopen($jsonFilePath12, 'w');
    $file3 = fopen($jsonFilePath13, 'w');
    // Ghi nội dung rỗng vào tệp
    fwrite($file, '');
    fwrite($file1, '');
    fwrite($file2, '');
    fwrite($file3, '');
    // Đóng tệp sau khi ghi
    fclose($file);
    fclose($file1);
    fclose($file2);
    fclose($file3);

    
    if ($role == 1) {
        // Nếu là admin, chuyển hướng đến trang admin
        $_SESSION['id'] = $userid;
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $username;
        

         // Lưu thông tin người dùng vào file JSON
        $userData = ['name' => $username, 'role' => $role];
        saveUserToJson($userData);

        header('location: /adminstrator/dist/index.php');
    } else if ($role == 2) {
        // Nếu là role 2, chuyển hướng đến trang index
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $username;
        
         // Lưu thông tin người dùng vào file JSON
         $userData = ['name' => $username, 'role' => $role];
        saveUserToJson($userData);

        header('location: webpage.php');
    } else {
        // Nếu không phải là admin hoặc role 2, hiển thị thông báo lỗi
        $txt_error = "Username or Password unavailable";
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
              <div class="navbar-header">
                  <h1><a href="webpage.php"><img style="width: 165px; height: 50px;" src="img/brand3.png"></a></h1>
              </div>
              </div>
              <div class="navbar-header">
                <a class="navbar-brand" href="#"></a>
              </div>
              <ul class="nav navbar-nav">
                <li class="active"><a href="webpage.php">Home</a></li>
                <li><a href="ListOfproducts.php">List Of Product</a></li>
                <li><a href="Offers.php">Offers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="shopping-item">
              <form action="#">
                <input type="text" placeholder="Search products..." />
                <input type="submit" value="Search" />
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
              <h2>Login Page</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="single-product-area">
      <div class="zigzag-bottom"></div>
      <div class="container">
        <div class="row">
          <?php require('includes/sidebar_webpage.php') ?>

          <div class="col-md-8">
            <div class="product-content-right">
              <div class="woocommerce">
                <form id="login-form-wrap" class="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                  <p>Login to your Account</p>
                  <br />

                  <p class="form-row form-row-first">
                    <label for="username"
                      >Username or email <span class="required">*</span>
                    </label>
                    <input
                      type="text"
                      id="username"
                      name="username"
                      class="input-text"
                    />
                  </p>
                  <p class="form-row form-row-last">
                    <label for="password"
                      >Password <span class="required">*</span>
                    </label>
                    <input
                      type="password"
                      id="password"
                      name="password"
                      class="input-text"
                    />
                  </p>
                  <div class="clear"></div>

                  <p class="form-row">
                    <input type="submit" name="login" value="LOGIN">
                  </p>
                  <br />
                  <p class="lost_password">
                    <a href="register.php"
                      >Don't Have Account? Register Here!</a
                    >
                  </p>

                  <div class="clear"></div>
                  <?php
                      if(isset($txt_error)&&($txt_error!="")){
                        echo "<font color='red'>".$txt_error."</font>";
                      }
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top-area">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="footer-about-us">
              <h2>
                <a href="webpage.php">DVDTrendy</a>
              </h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Perferendis sunt id doloribus vero quam laborum quas alias
                dolores blanditiis iusto consequatur, modi aliquid eveniet
                eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit,
                debitis, quisquam. Laborum commodi veritatis magni at?
              </p>
              <div class="footer-social">
                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="footer-menu">
              <h2 class="footer-wid-title">User Navigation</h2>
              <ul>
                <li><a href="profile.php">My account</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="checkout.php">Check Out</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="footer-menu">
              <h2 class="footer-wid-title">Categories</h2>
              <ul>
                <li><a href="webpage.php">Home</a></li>
                <li><a href="shop.php">Products</a></li>
                <li><a href="shop.php">Search</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="footer-newsletter">
              <h2 class="footer-wid-title">Newsletter</h2>
              <p>
                Sign up to our newsletter and get exclusive deals you wont find
                anywhere else straight to your inbox!
              </p>
              <div class="newsletter-form">
                <form action="#">
                  <input type="email" placeholder="Type your email" />
                  <input type="submit" value="Subscribe" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End footer top area -->

    <div class="footer-bottom-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <br /><br />
            2023 © DVDTrendy
          </div>

          <div class="col-md-8">
            <div class="footer-card-icon">
              <img src="img/payment.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End footer bottom area -->

    
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
