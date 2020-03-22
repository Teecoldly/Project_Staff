<?php
function querydata($command){
 
    $con = new mysqli("localhost","root","bigbang4542","saveold");
    $con->set_charset("UTF8");
    $result= $con->query($command);
    return $result;
    }
 
?>