<?php
session_start();
include "./model/user.php";
// Kiểm tra nếu người dùng đã nhấp vào nút "Logout"
if (isset($_POST['logout'])) {
    // Huỷ tất cả các session
    session_destroy();

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
                <h1>
                  <a href="webpage.php">DVDTrendy</a>
                </h1>
              </div>
              <div class="navbar-header">
                <a class="navbar-brand" href="#"></a>
              </div>
              <ul class="nav navbar-nav">
                <li class="active"><a href="webpage.php">Home</a></li>
                <li><a href="shop.php">All Product</a></li>
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
          <div class="col-md-4">
            <div class="single-sidebar">
              <h2 class="sidebar-title">Products</h2>
              <div class="thubmnail-recent">
                <img src="img/product-7.jpg" class="recent-thumb" alt="" />
                <h2>The Legend of Tarzan</h2>
                <div class="product-carousel-price">
                  <ins>$23</ins> <del>$50</del>
                </div>
              </div>
              <div class="thubmnail-recent">
                <img src="img/product-8.jpg" class="recent-thumb" alt="" />
                <h2>Shutter Island</h2>
                <div class="product-carousel-price">
                  <ins>23$</ins> <del>$25</del>
                </div>
              </div>
              <div class="thubmnail-recent">
                <img src="img/product-9.jpg" class="recent-thumb" alt="" />
                <h2><a href="#!">The Raid Redemption</a></h2>
                <div class="product-carousel-price">
                  <ins>$23</ins> <del>$25</del>
                </div>
              </div>
              <div class="thubmnail-recent">
                <img src="img/product-10.jpg" class="recent-thumb" alt="" />
                <h2>The Fault in Our Stars</h2>
                <div class="product-carousel-price">
                  <ins>$22</ins> <del>$25</del>
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
            <a href="webpage.php"
              ><button
                class="button"
                value="1"
                name="calc_shipping"
                type="submit"
              >
                Back to Home
              </button></a
            >
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
                <li><a href="shop.php">New Realese</a></li>
                <li><a href="shop.php">Top Rated Film</a></li>
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