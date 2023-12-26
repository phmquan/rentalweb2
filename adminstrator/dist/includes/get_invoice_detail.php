<?php
// includes/ajax.php
require_once('../database/config.php');
require_once('../database/dbhelper.php');



// Xử lý các yêu cầu CRUD bằng PHP
if (isset($_GET['invoice_id'])) {
    $invoice_id = $_GET['invoice_id'];

    $detail_sql = "SELECT Invoice_Detail.*, INVOICE.total_money as total, DVD.id AS dvd_id, DVD.title AS dvd_title, DVD.productimage
               FROM Invoice_Detail
               JOIN DVD ON Invoice_Detail.product_id = DVD.id
               JOIN INVOICE ON Invoice_Detail.order_id = INVOICE.id
               WHERE Invoice_Detail.order_id = $invoice_id";


    $detailList = execute_result($detail_sql);
    $totalMoney = 0; // Khởi tạo biến tổng giá tiền
    foreach ($detailList as $item) {
        echo "<tr>";
        echo "<td>{$item['id']}</td>";
        echo "<td>{$item['dvd_title']}</td>";
        echo "<td><img src='{$item['productimage']}' alt='Product Image' style='width: 100px; height: 100px;'></td>";
        echo "<td>{$item['num']}</td>";
        echo "<td>{$item['total_money']}</td>";
        echo "</tr>";
        $totalMoney += $item['total_money'];
    
    }
echo "<tr>";
echo "<td colspan='4' align='right'><strong>Total:</strong></td>";
echo "<td colspan='1' style='text-decoration: line-through;'>{$totalMoney}<br></td>";
echo "<td >{$item['total']}</td>";
echo "</tr>";




    
}
?>
