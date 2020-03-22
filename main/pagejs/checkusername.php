<?php
include_once "mainscrip.php";

if(isset($_POST["username"])){
    $user =$_POST["username"];
    $result=  querydata("select * from userinfo where username = '".$user."'  ");
    if($result ->num_rows>0){
        echo 1 ; 
    }else{
        echo 0;
    }
}

?>