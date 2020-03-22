<?php
include_once "mainscrip.php";

if(isset($_POST["email"])){
    $email =$_POST["email"];
    $result=  querydata("select * from userinfo where email = '".$email."'  ");
    if($result ->num_rows>0){
        echo 1 ; 
    }else{
        echo 0;
    }
}

?>