<?php
include_once("mainscrip.php");
$data = array(
    'key'=>$_POST["key"],
    'password'=>$_POST["password"],
);
 
 
$sql = "UPDATE `userinfo` SET  `password`='".$data["password"]."' WHERE `user_id` = (SELECT user_id from fgemailtb WHERE keymd5 ='".$data["key"]."')";
if(querydata($sql)){
    $sql= "DELETE FROM `fgemailtb` WHERE `keymd5`='".$data["key"]."'";
    querydata($sql);
    echo 'success';
}


?>