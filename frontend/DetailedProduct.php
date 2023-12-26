<?php
    include "./model/user.php";
?>


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
							<?php
                              session_start();
                              ob_start();
      // Kiểm tra xem có session role và role có giá trị 2 không
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
                        <li><a href="ListOfProducts.php">List Of Products</a></li>
                    </ul>
                
				</div>
				</div>
                <div class="col-sm-5">
                    <div class="shopping-item">
					<form action="search.php" method = "post" target = "_blank">
									<input type="text" name="search_query" placeholder="Search products...">
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
                        <h2>Product Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$conn = connectdb();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST["search_query"];

    // Chuyển hướng đến trang search.php với tham số tìm kiếm
    header("Location: search.php?query=" . urlencode($search_query));
    exit();
}
// Lấy tham số từ URL
$title = urldecode($_GET['title']);

// Truy vấn database để lấy thông tin chi tiết
$sql_detail = "SELECT * FROM DVD WHERE title LIKE '%$title%'";
$result_detail = $conn->query($sql_detail);

function insertCharacterToImagePath($imagePath, $prefix) {
    // Thêm đường dẫn vào trước đường dẫn hình ảnh
    $newImagePath = $prefix . $imagePath;
    return $newImagePath;
}

// Kiểm tra và hiển thị thông tin chi tiết
if ($result_detail->num_rows > 0) {
    $row_detail = $result_detail->fetch_assoc();
    echo '<div class="product-details">';
    
    echo '<div class="product-image">';
    $newImagePath = insertCharacterToImagePath($row_detail["productimage"], '../adminstrator/dist/');
    echo '<img src="' . $newImagePath . '" alt="' . $row_detail["title"] . '">';
    echo '</div>';
    echo '<div class="product-info">';
    echo '<h1 style="margin-top:100px">' . $row_detail["title"] . '</h1>';
    echo '<p>Giá: ' . $row_detail["price"] . '</p>';
    echo '<p>Description: ' . $row_detail["description"] . '</p>';
    echo '<input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1" style="margin-right:30px">';
    echo '<button class="add-to-cart-button" style="border-radius:5px;border:none;color:#5a88ca;padding: 5px 15px">Add to Cart</button>';
    echo '</div>';
    
    echo '</div>';  
}
 else {
    echo 'Không tìm thấy thông tin chi tiết.';
}
?>

                       
<div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><a href="index.php">DVDTrendy</a></h2>
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
                            <li><a href="profile.html">My account</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Check Out</a></li>
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