<?php
session_start();
include "./model/user.php";
// Kiểm tra nếu người dùng đã nhấp vào nút "Logout"
if (isset($_POST['logout'])) {
    // Huỷ tất cả các session
    session_destroy();
    $jsonFilePath = '../adminstrator/dist/json/user_data.json';
    $jsonFilePath1 = '../adminstrator/dist/json/usercart.json';
    $jsonFilePath12 = '../adminstrator/dist/json/usercart1.json';
    $file = fopen($jsonFilePath, 'w');
    $file1 = fopen($jsonFilePath1, 'w');
    $file2 = fopen($jsonFilePath12, 'w');
    // Ghi nội dung rỗng vào tệp
    fwrite($file, '');
    fwrite($file1, '');
    fwrite($file2, '');
    // Đóng tệp sau khi ghi
    fclose($file);
    fclose($file1);
    fclose($file2);

    // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính
    header('Location: webpage.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Page - DVDTrendy</title>

    <!-- Google Fonts -->
    <link
      href="http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="http://fonts.googleapis.com/css?family=Raleway:400,100"
      rel="stylesheet"
      type="text/css"
    />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-7"></div>
          <div class="col-md-5">
            <div class="header-right">
              <ul class="list-unstyled list-inline">
                <li>
                  <a href="cart.php"
                    ><i class="glyphicon glyphicon-shopping-cart"></i> Cart -
                    <span class="cart-amunt">$100</span>
                  </a>
                </li>
                <li>
                  <a href="profile.php"
                    ><i class="glyphicon glyphicon-user"></i> My Account</a
                  >
                </li>
                <li>
                <form method="post" action="">
        <button type="submit" name="logout" style="background:none; border:none; padding:0; margin:0; cursor:pointer; color:black;">
            <i class="glyphicon glyphicon-log-in"></i> Logout
        </button>
    </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End header area -->

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
                <li><a href="ListOfProducts.php">All Product</a></li>
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
              <h2>My Profile</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="single-product-area">
      <div class="zigzag-bottom"></div>
      <div class="container">
        <div class="row">
          
          <?php require('includes/sidebar_webpage.php'); ?>

          <div class="col-md-8">
            <h1>Your Detail Information</h1>
            <?php
               if(isset($_SESSION['role']) && isset($_SESSION['username'])) {
                $role = $_SESSION['role'];
                $username = $_SESSION['username'];
            
                // Now you can use $role and $username to load user information or perform other actions
            
                // Example: Accessing user information
                $userInfo = getUserInformation($username);
              
                if ($userInfo !== false) {
                    $fullName = $userInfo['fullname'];
                    $dateOfBirth = $userInfo['dayofbirth'];
                    $address = $userInfo['address'];
                    $email = $userInfo['email'];
                    $phoneNumber = $userInfo['PhoneNumber'];
            
                    // Now use $fullName, $dateOfBirth, $address, $email, $phoneNumber as needed
                }
                printf('<p style="font-size:24px;">Full Name: %s</p>', $fullName);
                printf('<p style="font-size:24px;">Date of Birth: %s</p>', $dateOfBirth);
                printf('<p style="font-size:24px;">Address: %s</p>', $address);
                printf('<p style="font-size:24px;">Email: %s</p>', $email);
                printf('<p style="font-size:24px;">Phone Number: %s</p>', $phoneNumber);

                
            }
            ?>
          <div class="">
            <a href="webpage.php" style="margin-bottom :20px"
              ><button
                class="button"
                value="1"
                name="calc_shipping"
                type="submit"
              >
                Back to Home
              </button> </a>
            <br>
            
            <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">
            <div id="order_review" style="position: relative; margin-top:10px">
            <table class="shop_table">
                <thead>
                    <tr>
                        <th class="product-name">Product</th>
                        <th class="product-name">Status</th>
                        <th class="product-total">Total</th>
                    </tr>                    
                </thead>
                <tbody>
                  <?php
                  // Đường dẫn đầy đủ đến tệp JSON usercart
                  $jsonFilePath = '../adminstrator/dist/json/profile.json';

                  // Kiểm tra xem tệp JSON có tồn tại hay không
                  if (file_exists($jsonFilePath)) {
                      // Đọc dữ liệu từ tệp JSON
                      $userCartData = json_decode(file_get_contents($jsonFilePath), true);
                      $cartSubtotal = 0; // Thêm biến để tính tổng giá trị

                      // Hiển thị từng sản phẩm trong giỏ hàng
                      foreach ($userCartData as $item) {
                          echo '<tr class="cart_item">';
                          echo '<td class="product-name">';
                          echo $item['title'] . ' <strong class="product-quantity">× ' . $item['quantity'] . '</strong> </td>';
                          echo '<td class="product-name">';
                          echo $item['status']; // Hiển thị trạng thái
                          echo '</td>';
                          echo '<td class="product-total">';
                          $subtotal = $item['price'] * $item['quantity'];
                          echo '<span class="amount">' . $subtotal . '$</span> </td>';
                          echo '</tr>';
                          // Cập nhật tổng giá trị
                          $cartSubtotal += $subtotal;
                      }

                // Hiển thị Cart Subtotal trong hàng thứ ba
                echo '<tr>';
                echo '<th class="product-total" colspan="2">Order Total</th>';
                echo '<td class="product-total">';
                echo '<span class="amount">' . $cartSubtotal . '$</span> </td>';
                echo '</tr>';
                  }
                  ?>
              </tbody>
          </table>
      </div>

                            
                            <script>
                                var cartSubtotal = <?php echo $cartSubtotal; ?>;
                            </script>
                        </tbody>
          </div>
                    </table>
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
  </body>
</html>