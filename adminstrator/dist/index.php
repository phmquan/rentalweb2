<?php
require('includes/header.php');
require('includes/navbar.php');
require('includes/sidebar.php');
require_once('database/dbhelper.php');
// Thực hiện truy vấn SQL để lấy dữ liệu
$sqlTotalRevenue = "SELECT SUM(total_money) AS total_revenue FROM INVOICE";
$sqlMonthlyRevenue = "SELECT SUM(total_money) AS monthly_revenue FROM INVOICE WHERE MONTH(order_date) = MONTH(CURRENT_DATE)";
$sqlTotalOrders = "SELECT COUNT(*) AS total_orders FROM INVOICE";
$sqlHotDVDGenres = "SELECT DVDCategory.name AS genre, COUNT(*) AS dvd_count FROM INVOICE
                    INNER JOIN Invoice_Detail ON INVOICE.id = Invoice_Detail.order_id
                    INNER JOIN DVD ON Invoice_Detail.product_id = DVD.id
                    INNER JOIN DVDCategory ON DVD.category_id = DVDCategory.id
                    GROUP BY genre ORDER BY dvd_count DESC LIMIT 1";


// Gọi hàm execute_result để thực hiện truy vấn và lấy kết quả
$totalRevenue = execute_result($sqlTotalRevenue);
$monthlyRevenue = execute_result($sqlMonthlyRevenue);
$totalOrders = execute_result($sqlTotalOrders);
$hotDVDGenres = execute_result($sqlHotDVDGenres);

// Thực hiện truy vấn SQL để lấy dữ liệu từ cơ sở dữ liệu
$sql = "SELECT DATE_FORMAT(order_date, '%d/%m') AS order_month, SUM(total_money) AS total_money 
        FROM INVOICE 
        GROUP BY order_month";
$invoiceData = execute_result($sql);

// Chuyển đổi dữ liệu trước khi lưu vào tệp JSON
$jsonData = [];
foreach ($invoiceData as $item) {
    $jsonData[] = [
        'order_month' => $item['order_month'], // Giữ nguyên dạng chuỗi
        'total_money' => (int)$item['total_money'], // Chuyển đổi sang số nguyên
    ];
}

// Trả về dữ liệu dưới dạng JSON
//echo json_encode($jsonData, JSON_PRETTY_PRINT);

// Đường dẫn tới tệp tin
$file_path = 'json/chartdata.json';
file_put_contents($file_path, json_encode(['Areachart' => $jsonData], JSON_PRETTY_PRINT));


// Truy vấn SQL để lấy tổng doanh thu mỗi tháng, bao gồm cả tháng không có doanh thu
$sql = "
SELECT 
    YEAR(A.order_date) AS year,
    M.month_number AS month,
    COALESCE(SUM(A.total_money), 0) AS monthly_revenue
FROM (
    SELECT 1 AS month_number UNION SELECT 2 UNION SELECT 3 UNION SELECT 4
    UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8
    UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
) M
LEFT JOIN INVOICE A ON M.month_number = MONTH(A.order_date)
    AND YEAR(A.order_date) = 2023 -- Thay 2023 bằng năm bạn quan tâm
GROUP BY YEAR(A.order_date), M.month_number
ORDER BY year, month;

";

// Thực hiện truy vấn SQL để lấy dữ liệu từ cơ sở dữ liệu
$invoiceData = execute_result($sql);

// Chuyển đổi dữ liệu trước khi lưu vào tệp JSON
$jsonData = [];
foreach ($invoiceData as $item) {
    $jsonData[] = [
        'order_month' => $item['month'],// Chuỗi "YYYY-MM"
        'monthly_revenue' => (int)$item['monthly_revenue'], // Chuyển đổi sang số nguyên
    ];
}

// Lưu dữ liệu vào tệp JSON
$jsonFileName = 'json/bardata.json';
file_put_contents($jsonFileName, json_encode(['Barchart'=>$jsonData], JSON_PRETTY_PRINT));

//echo "Dữ liệu đã được lưu vào tệp $jsonFileName";
?>

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Tổng Doanh Thu: <?php echo $totalRevenue[0]['total_revenue']; ?></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Doanh Thu Tháng: <?php echo $monthlyRevenue[0]['monthly_revenue']; ?></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Tổng đơn hàng: <?php echo $totalOrders[0]['total_orders']; ?></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Thể loại DVD hot: <?php echo $hotDVDGenres[0]['genre']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <?php
                        // Lấy tháng hiện tại
                        $currentMonth = date('m');
                        ?>
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Doanh thu  <!--<?php echo $currentMonth; ?> -->   
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <?php
                        // Lấy tháng hiện tại
                        $currentYear = date('Y');
                        ?>
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Doanh thu năm <?php echo $currentYear; ?>
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php

require('includes/script.php');
require('includes/footer.php');
?>

