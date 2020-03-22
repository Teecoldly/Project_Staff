<?php 
session_start();
function querydata($command){
 
    $con = new mysqli("localhost","root","bigbang4542","saveold");
    $con->set_charset("UTF8");
    $result= $con->query($command);
    return $result;
    }
if (isset($_POST["login"])){
    $username=$_POST["username"];
    $pass=$_POST["password"];
    $result = querydata("select * from userinfo where username= '". $username."' and password = '".$pass."'");
    if($result->num_rows<1){
        echo "Not success";
    }else{
        $row =$result->fetch_assoc();
        $_SESSION["userlogin"]= $row["name"];
        $_SESSION["Type"] =2;
        $_SESSION["U_ID"] =$row["user_id"];
 
        echo "success"; 
        
       
    }
}
?>