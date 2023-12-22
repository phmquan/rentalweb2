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
if ($action == 'delete') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM DVDCategory WHERE id = $id";
   execute($sql);
};
?>
