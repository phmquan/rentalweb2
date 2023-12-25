<?php
require_once('config.php');

function execute($sql){
    //open connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    //mysqli_set_charset($conn,'utf-8');

    //query
    mysqli_query($conn, $sql);

    //close connection
    mysqli_close($conn);
}

function execute_result($sql){

    $result = null;
    //open connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    //$conn = mysqli_connect('127.0.0.1', 'root', '', 'DVD_WEBRENTAL');
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    //mysqli_set_charset($conn,'utf-8');

    //query
    $resultset = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($resultset)) {
        $result[]=$row;
    }
    
    
    //close connection
    mysqli_close($conn);

    return $result;

}
?>