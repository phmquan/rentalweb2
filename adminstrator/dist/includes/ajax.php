<?php
// includes/ajax.php

function execute($sql){
    //open connection
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'DVD_WEBRENTAL');
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    //mysqli_set_charset($conn,'utf-8');

    //query
    mysqli_query($conn, $sql);

    //close connection
    mysqli_close($conn);
} 
// Xử lý các yêu cầu CRUD bằng PHP
$action = $_POST['action'];

if ($action == 'add') {
   // Xử lý thêm mới
   $name = $_POST['name'];
   $sql = "INSERT INTO DVDCategory (name) VALUES ('$name')";
   execute($sql);
}; 
if ($action == 'edit') {
   // Xử lý sửa
   $id = $_POST['id'];
   $name = $_POST['name'];
   $sql = "UPDATE DVDCategory SET name = '$name' WHERE id = $id";
   execute($sql);
}; 
if ($action == 'deletecategory') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM DVDCategory WHERE id = $id";
   execute($sql);
};
if ($action == 'deletedvd') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM DVD WHERE id = $id";
   execute($sql);
};
if ($action == 'deleteuser') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM USER WHERE id = $id";
   execute($sql);
};
if ($action == 'deleteoffer') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM OFFER WHERE id = $id";
   execute($sql);
};
if ($action == 'deleteinvoice') {
   // Xử lý xoá
   $id = $_POST['id'];
   // Delete records from the child table (invoice_detail)
   $sqlChild = "DELETE FROM Invoice_detail WHERE order_id = $id";
   execute($sqlChild);
   // Delete record from the parent table (INVOICE)
   $sqlParent = "DELETE FROM INVOICE WHERE id = $id";
   execute($sqlParent);
};
if ($action == 'deleteinvoidetail') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM Invoice_detail WHERE id = $id";
   execute($sql);
};
?>
