<?php
//GET POST COOKIE
function getGet($key) {
    $value ='';
    if(isset($_GET[$key])){
        $value = $_GET[$key];
    }
    return $value;
}

function getPost($key) {
    $value ='';
    if(isset($_POST[$key])){
        $value = $_POST[$key];
    }
    return $value;
}

function getCookie($key) {
    $value ='';
    if(isset($_COOKIE[$key])){
        $value = $_COOKIE[$key];
    }
    return $value;
}

function getRequest($key) {
    $value ='';
    if(isset($_REQUEST[$key])){
        $value = $_REQUEST[$key];
    }
    return $value;
}