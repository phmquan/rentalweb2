

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DVDTrendy</title>
    
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
							<li><a href="cart.html"><i class="glyphicon glyphicon-shopping-cart"></i> Cart - <span class="cart-amunt">$100</span>  </a></li>
							<?php
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
                        <li><a href="ListOfProducts.php">List of Products</a></li>
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