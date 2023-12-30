<?php
session_start();
include "./model/user.php";


function saveUserToJson($userData) {
  $jsonFilePath = '../adminstrator/dist/json/profile.json';
  // Đọc dữ liệu từ file JSON hiện tại (nếu có)
  $currentData = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];

  // Thêm dữ liệu người dùng mới vào mảng
  $currentData[] = $userData;

  // Ghi dữ liệu vào file JSON
  file_put_contents($jsonFilePath, json_encode($currentData, JSON_PRETTY_PRINT));
}

    $jsonFilePath13 = '../adminstrator/dist/json/profile.json';
    $file3 = fopen($jsonFilePath13, 'w');
    fwrite($file3, '');
    fclose($file3);
    $jsonFilePath13 = '../adminstrator/dist/json/user_data.json';
    $userCartData1 = json_decode(file_get_contents($jsonFilePath13), true);
    foreach ($userCartData1 as $item) {
        $account = $item['name'];
        $role = $item['role'];
    }
    $user_id = 0;
    // Kiểm tra xem email đã tồn tại trong bảng user hay chưa
    $sqlCheckUser = "SELECT id FROM user WHERE (account = '$account' OR email = '$account' )";
    $result = execute_Result($sqlCheckUser);

    // Nếu email tồn tại, lấy user_id, ngược lại thêm mới user và lấy user_id
    if ($result && count($result) > 0) {
      $user_id = $result[0]['id'];
    } 


    // Kiểm tra xem user_id đã được thiết lập hay không
   
    // Truy vấn để lấy dữ liệu từ bảng invoice tương ứng với user_id
    $sqlGetInvoices = "SELECT
                            Invoice_Detail.order_id as order_id,
                            Invoice_Detail.product_id AS dvd_id,
                            Invoice_Detail.price,
                            Invoice_Detail.num AS quantity,
                            Invoice_Detail.total_money AS total_money,
                            Invoice.status,
                            Invoice.discount
                        FROM
                            Invoice_Detail
                        JOIN
                            Invoice ON Invoice_Detail.order_id = Invoice.id
                        WHERE
                            Invoice.user_id = $user_id;
                        ";
    $invoiceResults = execute_Result($sqlGetInvoices);

    // Tạo một mảng để lưu trữ thông tin của từng đơn hàng
    $userCartData = [];
    if (!empty($invoiceResults)){    // Duyệt qua kết quả của truy vấn
    foreach ($invoiceResults as $invoiceResult) {
        $userCartData[] = [
            'order_id' => $invoiceResult['order_id'],
            'product_id' => $invoiceResult['dvd_id'],
            'price' => $invoiceResult['price'],
            'quantity' => $invoiceResult['quantity'],
            'total_money' => $invoiceResult['total_money'],
            'status' => $invoiceResult['status'],
            'discount' => $invoiceResult['discount']
        ];
    }};
saveUserToJson($userCartData);  


// Kiểm tra nếu người dùng đã nhấp vào nút "Logout"
if (isset($_POST['logout'])) {
    // Huỷ tất cả các session
    session_destroy();
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

    // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính
    header('Location: webpage.php');
    exit();
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
  <style>
    /* Định nghĩa màu sắc cho các trạng thái */
    .status-button.processing {
        background-color: #B80000; /* Màu do cho Processing */
    }

    .status-button.shipped {
        background-color: #FF9800; /* Màu vang cho Shipped */
    }

    .status-button.completed {
        background-color: #5F8670; /* Màu xanh la cho Completed */
    }

    /* Màu mặc định cho trạng thái khác */
    .status-button.default {
        background-color: #aaa;
    }

    /* Thêm kiểu dáng cho button */
    .status-button {
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }
  </style>
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
                    <span class="cart-amunt">$0</span>
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
                <li><a href="ListOfProducts.php">Products</a></li>
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
            <th class="product-name">Invoice</th>
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
            $invoiceCounter = 0; // Biến đếm hoá đơn
            $currentOrderId = 0;


            $orderCount = []; // Mảng kết hợp để theo dõi số lượng hóa đơn cho mỗi order_id
            $data = $userCartData;
            // Lặp qua mảng JSON và đếm số lượng hóa đơn cho mỗi order_id
            foreach ($data as $orderItems) {
                foreach ($orderItems as $item) {
                    $orderId = $item['order_id'];
                    if (isset($orderCount[$orderId])) {
                        $orderCount[$orderId]++;
                    } else {
                        $orderCount[$orderId] = 1;
                    }
                }
            }
            $cartSubtotal =0; 
            // Hiển thị từng sản phẩm trong giỏ hàng
            foreach ($userCartData as $order) {
                foreach ($order as $item) {
                  if ($currentOrderId !== $item['order_id']) {
                    $invoiceCounter++;
                      // Nếu là order mới, hiển thị thông tin đầu tiên của order
                      echo '<tr class="cart_item">';
                      echo '<td class="product-name" rowspan="' . $orderCount[$item['order_id']] . '">';
                      echo 'Invoice' . $invoiceCounter;
                      echo '</td>';
                      $currentOrderId = $item['order_id'];
                    } 
            
                    echo '<td class="product-name">';
                    echo '<img style="width: 100px; height: 100px" src="../adminstrator/dist/database/productimage/productimage_'.$item['product_id'].'.png"><br>';
                    echo 'x' . $item['quantity'] . '<br>';                   
                    echo '</td>';
                    // echo '<td class="product-name">';
                    // echo '' . $item['status'];
                    // echo '</td>';
                    echo '<td class="product-name">';
                    // Sử dụng class CSS dựa trên giá trị của trạng thái
                    $statusClass = '';
                    switch ($item['status']) {
                        case 'Processing':
                            $statusClass = 'processing';
                            break;
                        case 'Shipped':
                            $statusClass = 'shipped';
                            break;
                        case 'Completed':
                            $statusClass = 'completed';
                            break;
                        default:
                            $statusClass = 'default';
                            break;
                    }
                    echo '<button class="status-button ' . $statusClass . '">' . $item['status'] . '</button>';
                    echo '</td>';

                    echo '<td class="product-total">';
                    echo '<span class="amount">' . $item['total_money']*(1-($item['discount']/100)) . '$</span>';
                    echo '</td>';
                    echo '</tr>';
                    // Cập nhật tổng giá trị
                    $cartSubtotal += (int)$item['total_money']*(1-($item['discount']/100));
                    $discount = $item['discount'];
                }
                $invoiceCounter++;
            }
            // Hiển thị Cart Subtotal trong hàng thứ ba
           
            echo '<tr>';
            echo '<th class="product-total" colspan="3">Order Total</th>';
            echo '<td class="product-total">';
            echo '<span class="amount">' . $cartSubtotal . '$</span>';
            echo '</td>';
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