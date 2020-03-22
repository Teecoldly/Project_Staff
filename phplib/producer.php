<?php 
include_once 'connet.php';
include_once 'libary/QRCODE/vendor/autoload.php';
 
class producer extends connet    {
    public function __construct( ) {
      parent:: __construct('localhost','root','bigbang4542','saveold');
    }
   
    public function createuser($password)
    {
        global  $con;
        $key_username= substr(md5(date("h:i:s").rand(0,99999). date("Y/m/d")), 0, 12) ;
        $sql= "INSERT INTO `userinfo`(`username` , `password`,name ) VALUES ('".$key_username."','".$password."','Anonymous')";
        $result = self::querydata($sql);
        if($result){
             $sql ="SELECT `user_id` FROM  `userinfo` WHERE  `username` ='" .$key_username. "'";
             $user_id =self:: querydata_fetch_assoc_onone($sql,"user_id");
            if($user_id!=0){
                $sql  = "INSERT INTO `elderlypeople`(  `user_id`,ep_key ) VALUES ('".$user_id."','".$key_username."')" ;
                $result = self::querydata($sql);
                if($result){
                    $sql ="SELECT `ep_id`  FROM `elderlypeople` WHERE  `user_id` = '".$user_id."'";
                    $ep_id =self:: querydata_fetch_assoc_onone($sql,"ep_id");
                    if($ep_id!=0){
                    $sql = "INSERT INTO `eventtime`(`ep_id` ) VALUES ('".$ep_id ."')";
                    if(!self::querydata($sql)){echo 'error insert  "eventtime"' ;}
                    $sql = "INSERT INTO `location`(  `ep_id` )  VALUES ('".$ep_id ."')";
                    if(!self::querydata($sql)){echo 'error insert  "location"';}
                    }else{echo 'error select  "ep_id"';}
                }else{echo 'error insert "elderlypeople"';}
            }else{echo 'error select "user_id"';}
        }else{echo 'error insert "userinfo"'; echo $sql;}
        \PHPQRCode\QRcode::png("http://iti.teecoldly.me/main/showdata.php?Key=".$key_username, "images/qrcode/".$key_username.".png", 'L', 8, 4);
        return $key_username;
    }   
}



?>