<?php
    function connectdb(){
        $con=mysqli_connect("localhost","root","","web_dvdrental");
        return $con;
    }
?>