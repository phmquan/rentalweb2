

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

<body>

<div class="search-container">
<?php
include "./model/user.php";
$conn = connectdb();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST["search_query"];

    echo '<h1 style="color: #5a88ca; text-align:center">Sản phẩm bạn tìm kiếm</h1>';


    $sql = "SELECT title, productimage, price FROM DVD WHERE title LIKE '%$search_query%'";
    $result = $conn->query($sql);
    $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
function insertCharacterToImagePath($imagePath, $prefix) {
    // Thêm đường dẫn vào trước đường dẫn hình ảnh
    $newImagePath = $prefix . $imagePath;

    return $newImagePath;
}
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-item">';
            echo '<a href="DetailedProduct.php?title=' . urlencode($row["title"]) . '">';
            $newImagePath = insertCharacterToImagePath($row["productimage"], '../adminstrator/dist/');
            echo '<img class="product-image" src="' . $newImagePath . '" alt="' . $row["title"] . '">';
            echo '</a>';
            echo '<div class="product-title">' . $row["title"] . '</div>';
            echo '<div class="product-title">$' . $row["price"] . '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<h1 style="color: #5a88ca;">Không tìm thấy sản phẩm</h1>';
    }
}

$conn->close();
?>

</div>
  

</body>

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
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
  </body>
</html>