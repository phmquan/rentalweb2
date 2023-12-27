<?php
  session_start();
  ob_start();
  include "./model/user.php";
  if (isset($_POST['login']) && $_POST['login']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = checkuser($username, $password);

    if ($role == 1) {
        // Nếu là admin, chuyển hướng đến trang admin
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $username;
        header('location: /adminstrator/dist/index.php');
    } else if ($role == 2) {
        // Nếu là role 2, chuyển hướng đến trang index
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $username;
        header('location: webpage.php');
    } else {
        // Nếu không phải là admin hoặc role 2, hiển thị thông báo lỗi
        $txt_error = "Username or Password unavailable";
    }
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
                <!-- <li>
                  <a href="profile.php"
                    ><i class="glyphicon glyphicon-user"></i> My Account</a
                  >
                </li> -->
                <li>
                  <a href="login.php"
                    ><i class="glyphicon glyphicon-log-in"></i> Login</a
                  >
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

    <?php include "./includes/footer_webpage.php"?>
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
