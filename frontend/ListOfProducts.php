<?php
    include "./model/user.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Page - DVDTrendy</title>
    
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
        // Nếu role là 2, ẩn Login
        echo'<li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>';
    } else {
        // Nếu role không phải là 2, hiển thị Login
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
                        <li><a href="ListOfProducts.php">List of Products</a></li>
                    </ul>
                
				</div>
				</div>
                <div class="col-sm-5">
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>List Of Product</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <div id="main-search" class="content-dark hidden-sm hidden-xs">
        <div class="container">
            <div id="main-search" class="content-dark hidden-sm hidden-xs">
            <div class="container">
                    
                <form method="post" action="Search.php" accept-charset="UTF-8" id="browse_movies">
                    <!--input name="s" id="s" type="hidden" -->
                    <div id="main-search-fields">
                                        <p class="pull-left term">Search DVD :</p>
                        <input name="search_query" value="" autocomplete="off" type="search">					
                            
                    </div>
                    
                        <input class="button-green-download-big" type="submit" value="Search">
                    
                </form>
                 
<?php
$conn = connectdb();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST["search_query"];

    // Chuyển hướng đến trang search.php với tham số tìm kiếm
    header("Location: search.php?query=" . urlencode($search_query));
    exit();
}
?>
                		</div>
        </div>
        </div>
    </div>
</center>
<div id="product-list">

</div>    


<div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <!-- Your existing HTML code -->

<!-- Add a button with an onclick event -->
<!-- Your existing HTML code -->

<button id="watchMoreBtn" onclick="loadMoreProducts()">Watch More</button>

<script>
    let start = 0; // Set the initial starting point

    // Initial load when the page loads
    window.onload = function() {
        loadMoreProducts();
    };

    function loadMoreProducts() {
        // Use AJAX to fetch more products from the server
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                // Append the new products to the existing content
                document.getElementById("product-list").innerHTML += this.responseText;
                start += 20; // Increment the starting point for the next batch of products
            }
        };
        xhttp.open("GET", "ShowListProduct.php?start=" + start, true);
        xhttp.send();
    }
</script>

<!-- Add a button with an onclick event -->



                        </nav>                        
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
                        <h2><a href="webpage.php">DVDTrendy</a></h2>
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
                            <li><a href="ListOfProducts.php">Shop</a></li>
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
                            <li><a href="ListOfProducts.php">ListOfProducts</a></li>
                            <li><a href="ListOfProducts.php">Top Rated Film</a></li>
                            <li><a href="ListOfProducts.php">Search</a></li>
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
