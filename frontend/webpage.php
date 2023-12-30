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
                            <h1><a href="webpage.php"><img style="width: 165px; height: 50px;" src="img/brand3.png"></a></h1>
                        </div>
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"></a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="webpage.php">Home</a></li>
                            <li><a href="ListOfProducts.php">Products</a></li>
                            <li><a href="Offers.php">Offers</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shopping-item">
                        <form action="search.php" method="post" target="_blank">
                            <input type="text" name="search_query" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
include('./model/user.php');    
$conn = connectdb();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST["search_query"];

    // Chuyển hướng đến trang search.php với tham số tìm kiếm
    header("Location: search.php?query=" . urlencode($search_query));
    exit();
}
?>

    <div class="slider-area" id="sliderarea">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <li>
                    <img src="img/h4-slide.png" alt="Slide">
                </li>
                <li><img src="img/h4-slide2.png" alt="Slide">
                </li>
                <li><img src="img/h4-slide3.png" alt="Slide">
                </li>
                <li><img src="img/h4-slide4.png" alt="Slide">
                </li>
            </ul>
        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->

    <script>
        // Lấy phần tử slider-area
        var sliderArea = document.getElementById('sliderarea');

        // Thêm sự kiện click
        sliderArea.addEventListener('click', function() {
            // Chuyển hướng đến trang Offers.php khi bấm vào slider
            window.location.href = 'Offers.php';
        });
    </script>
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-gift"></i>
                        <p>Discount</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <div class="product-big-title-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="product-bit-title text-center">
                                            <h2>Pick Your CD</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Page title area -->
                        <div id="product-container"></div>
                        <script>
                        let start = 20;
                        let xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                // Assuming you have a container with the id "product-container" to display the products
                                document.getElementById("product-container").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "ShowListProduct.php?start=" + start, true);
                        xhttp.send();
                        </script>
                        <br><br>
                        <ul class="pager">
                            <!-- <li><a href="#">Previous</a></li>
  <li><a href="#">Next</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- End main content area -->


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

        <!-- Slider -->
        <script type="text/javascript" src="js/bxslider.min.js"></script>
        <script type="text/javascript" src="js/script.slider.js"></script>
</body>

</html>