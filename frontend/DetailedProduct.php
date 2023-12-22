<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Page - DVDTrendy</title>
    
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
                <div class="col-md-7">
                </div>
                <div class="col-md-5">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
							<li><a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i> Cart - <span class="cart-amunt">$100</span>  </a></li>
							<li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>
							<li><a href="login.php"><i class="glyphicon glyphicon-log-in"></i> Logout</a></li>

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
                        <li><a href="ListOfProducts.php">List Of Products</a></li>
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
                        <h2>Thông tin chi tiết sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
$servername = "localhost"; 
$username = "root";   
$password = "";    
$dbname = "web_dvdrental";  

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy tham số từ URL
$title = urldecode($_GET['title']);

// Truy vấn database để lấy thông tin chi tiết
$sql_detail = "SELECT * FROM DVD WHERE title = '$title'";
$result_detail = $conn->query($sql_detail);

// Kiểm tra và hiển thị thông tin chi tiết
if ($result_detail->num_rows > 0) {
    $row_detail = $result_detail->fetch_assoc();
    echo '<h1>' . $row_detail["title"] . '</h1>';
    echo '<p>Giá: ' . $row_detail["price"] . '</p>';
    echo '<p>Mô tả: ' . $row_detail["description"] . '</p>';
} else {
    echo 'Không tìm thấy thông tin chi tiết.';
}

// Đóng kết nối database
$conn->close();
?>
                       
<div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><a href="index.php"><img src="img/brand2.png"></a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
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
                        <h2 class="footer-wid-title">User Navigation </h2>
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php">New Realese</a></li>
                            <li><a href="shop.php">Top Rated Film</a></li>
                            <li><a href="shop.php">Search</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
				<br/><br/>
                2023 © DVDTrendy    
                </div>
                
                <div class="col-md-8">
                    <div class="footer-card-icon">
						<img src="img/payment.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
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