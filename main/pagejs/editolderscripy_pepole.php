<?php
include "mainscrip.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
$syntaxdatabase =[];
for($i=6;$i<=18;$i++){
    array_push($syntaxdatabase ,"time_".$i);
}
 
$data  = array( 
                        'uid'=>$_POST["uid"],
                        'userinfo'=>$_POST["userinfo"],
                        'passwordlogin'=>$_POST["passwordlogin"],
                        'name'=>$_POST["name"],
                        'email'=>$_POST["email"],
                        'Key'=>$_POST["key"],
                        'firstname' =>$_POST["firstname"],
                        'lastname'=>$_POST["lastname"],
                        'birthday'=>$_POST["birthday"],
                        'sex'=>$_POST["sex"],
                        'height'=>$_POST["height"],
                        'weight'=>$_POST["weight"],
                        'adress'=>$_POST["adress"],
                        'nameCaretaker'=>$_POST["nameCaretaker"], 
                        'numberphone'=>$_POST["numberphone"], 
                        'numberphones1'=>$_POST["numberphones1"],
                        'numberphones2'=>$_POST["numberphones2"],
                        'linetoken'=>$_POST["linetoken"],
                        'linetokens1'=>$_POST["linetokens1"], 
                        'linetokens2'=>$_POST["linetokens2"], 
                        'lat'=>$_POST["lat"],
                        'long'=>$_POST["long"],
);
 
 
 

 if(isset($_FILES["img"])){
     $sql="UPDATE `userinfo` SET 	username='".$data["userinfo"]. "', `password`= '".$data["passwordlogin"]."' ,  `email`= '".$data["email"]."' , `name`= '".$data["name"]."'  WHERE `user_id` =".$data["uid"];
   querydata($sql);
 
     $sourcePath = $_FILES['img']['tmp_name'];
    $imgmd5 = $data["Key"].".jpg" ;
    $targetPath = "../../images/imgolder/".$imgmd5;  
    if(file_exists( $imgmd5)) {
        chmod($imgmd5,0755);
        unlink(  $targetPath); //remove the file
    }
    move_uploaded_file($sourcePath,$targetPath);
 
 
   $sql="UPDATE elderlypeople SET  ep_name='".$data['firstname']."',ep_lastname='".$data['lastname']."',ep_birthday='".$data['birthday']."',ep_sex='".$data['sex']."',
   ep_height='".$data['height']."',ep_weight='".$data['weight']."',ep_adress='".$data['adress']."',ep_img='". $imgmd5 ."',ep_nameCaretaker='".$data['nameCaretaker']."',ep_numberphone='".$data['numberphone']."',ep_linetoken='".$data['linetoken']."',ep_lat=".$data['lat'].",ep_long=".$data['long']
       .",ep_numberphone_1='".$data['numberphones1']."',ep_numberphone_2='".$data['numberphones2']."',ep_linetoken_1='".$data['linetokens1']."',ep_linetoken_2='".$data['linetokens2']."' where ep_id = (SELECT * FROM (SELECT `ep_id` FROM elderlypeople b WHERE b.ep_key = '".$data['Key']."') as b )";
    
   if(querydata($sql)){
       if(isset($_POST["timeevent"])){
        $sql = "UPDATE `eventtime` SET ";
        $timeevent =(array) json_decode($_POST["timeevent"]);
   
            for($i = 0 ;$i<=12 ; $i++){
                if(array_key_exists($syntaxdatabase[$i],$timeevent)){
                    if($i<=11){
                    $sql.=$syntaxdatabase[$i] ."='". $timeevent[$syntaxdatabase[$i]]."',";
                    }
                    else{
                        $sql.=$syntaxdatabase[$i] ."='". $timeevent[$syntaxdatabase[$i]]."'";
                    }
                }else{
                    if($i<=11){
                        $sql.=$syntaxdatabase[$i] ."='',";
                    }
                     else{
                        $sql.=$syntaxdatabase[$i] ."='' ";
                     }
                }
            }
            $sql.=" where ep_id = (SELECT * FROM (SELECT `ep_id` FROM elderlypeople b WHERE b.ep_key = '".$data['Key']."') as b )";
            if(!querydata($sql)){
                echo "error";
            }
        }
       echo "success";
   }else{
    echo "error";
   }
 
}else{
    $sql="UPDATE `userinfo` SET username='".$data["userinfo"]. "',`password`= '".$data["passwordlogin"]."' ,   `email`= '".$data["email"]."' , `name`= '".$data["name"]."'  WHERE `user_id` =".$data["uid"];
    querydata($sql);
    
    $sql="UPDATE elderlypeople SET  ep_name='".$data['firstname']."',ep_lastname='".$data['lastname']."',ep_birthday='".$data['birthday']."',ep_sex='".$data['sex']."',
    ep_height='".$data['height']."',ep_weight='".$data['weight']."',ep_adress='".$data['adress']."',ep_nameCaretaker='".$data['nameCaretaker']."',ep_numberphone='".$data['numberphone']."',ep_linetoken='".$data['linetoken']."',ep_lat=".$data['lat'].",ep_long=".$data['long']
    .",ep_numberphone_1='".$data['numberphones1']."',ep_numberphone_2='".$data['numberphones2']."',ep_linetoken_1='".$data['linetokens1']."',ep_linetoken_2='".$data['linetokens2']."'	 where ep_id = (SELECT * FROM (SELECT `ep_id` FROM elderlypeople b WHERE b.ep_key = '".$data['Key']."') as b )";
     
    if(querydata($sql)){
        if(isset($_POST["timeevent"])){
         $sql = "UPDATE `eventtime` SET ";
         $timeevent =(array) json_decode($_POST["timeevent"]);
    
             for($i = 0 ;$i<=12 ; $i++){
                 if(array_key_exists($syntaxdatabase[$i],$timeevent)){
                     if($i<=11){
                     $sql.=$syntaxdatabase[$i] ."='". $timeevent[$syntaxdatabase[$i]]."',";
                     }
                     else{
                         $sql.=$syntaxdatabase[$i] ."='". $timeevent[$syntaxdatabase[$i]]."'";
                     }
                 }else{
                     if($i<=11){
                         $sql.=$syntaxdatabase[$i] ."='',";
                     }
                      else{
                         $sql.=$syntaxdatabase[$i] ."='' ";
                      }
                 }
             }
             $sql.=" where ep_id = (SELECT * FROM (SELECT `ep_id` FROM elderlypeople b WHERE b.ep_key = '".$data['Key']."') as b )";
         
             if(!querydata($sql)){
                 echo "error ";
             }
         }
        echo "success";
    }else{
     echo "error13";
    }
}
?>