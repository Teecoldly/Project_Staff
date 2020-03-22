<?php 
 
define('LINE_API',"https://notify-api.line.me/api/notify");
$key = $_REQUEST["key"];
if(isset($_REQUEST["lm"]) && isset($_REQUEST["lp"]) && isset($_REQUEST["acd"])){
    $lat= $_REQUEST["lm"];
    $long = $_REQUEST["lp"];
    $accidentstatus = $_REQUEST["acd"];
    accidentstatus($key,$accidentstatus,$lat,$long);     
} 
if(isset($_REQUEST["time"])){
    $lat= $_REQUEST["lm"];
    $long = $_REQUEST["lp"];
    $time = $_REQUEST["time"];
    timestatus($key,$time,$lat,$long);
}
if(isset($_REQUEST["lm"]) && isset($_REQUEST["lp"]) && isset($_REQUEST["start"])){
    $lat= $_REQUEST["lm"];
    $long = $_REQUEST["lp"];
    setupstart($key,$lat,$long);
}
if(isset($_REQUEST['getjson'])){
    $sql = "SELECT ep_key from elderlypeople WHERE `ep_id` in ( SELECT ep_id FROM `eventtime` WHERE `time_6`!=''or`time_7`!=''or`time_8`!=''or`time_9`!=''or`time_10`!=''or`time_11`!=''or`time_12`!=''or`time_13`!=''or`time_14`!=''or`time_15`!=''or`time_16`!=''or`time_17`!=''or`time_18`!='' )";
    $result= querydata($sql);
    $data = array();
    while($row=$result->fetch_assoc()){
        $data[] = $row['ep_key'];
    }
    $json   = json_encode($data);
    echo $json;
}
if(isset($_REQUEST["tm"]) )
{
    $time = $_REQUEST["tm"];

    $result =querydata("SELECT `ep_linetoken`,ep_linetoken_1,	ep_linetoken_2,ep_name from elderlypeople WHERE `ep_key` = '".$key."'");
    if($result->num_rows >0){
        $row = $result->fetch_array();
        $linetoken=$row[0];
        $linetoken1=$row[1];
        $linetoken2=$row[2];
        $name = $row[3];
 
        $result=querydata("SELECT time_" .$time . ",ep_name FROM eventtime INNER JOIN elderlypeople on eventtime.ep_id = elderlypeople.ep_id WHERE elderlypeople.ep_key ='".$key."'");
        if($result->num_rows>0){
            $row = $result->fetch_array();
            if($row[0]!=''){

            
            $text ="คุณ ".$name." \nถึงเวลาทานยาหรือกิจกรรม ".$time." นาฬิกาแล้ว\nข้อมูลการทานยาหรือกิจกรรม\n".$row[0];
     
            if(strlen($text)>0){
                print_r( notify_message(strval($text),strval($linetoken)));
                print_r( notify_message(strval($text),strval($linetoken1)));
                print_r( notify_message(strval($text),strval($linetoken2)));
            }else{}

            }

        }else{}
    }else{}
}
 function querydata($sql)
{
    $con = new mysqli("localhost","root","bigbang4542","saveold");
    $con -> set_charset("utf8");
    $result = $con ->query($sql);
    return  $result;
} 
function accidentstatus($key,$accidentstatus,$lat,$long){
    $reuslt =querydata("SELECT  `ep_linetoken`,	ep_linetoken_1,	ep_linetoken_2,ep_name	  from elderlypeople WHERE `ep_key` = '".$key."'");
    if($reuslt->num_rows >0){
        $row = $reuslt->fetch_array();
        $linetoken=$row[0];
        $linetoken1=$row[1];
        $linetoken2=$row[2];
        $name = $row[3];
        if($lat==-1 || $long ==-1){
            $reuslt =  querydata("SELECT  `lc_lat`,`lc_long` FROM `location` WHERE `ep_id` = (SELECT ep_id from elderlypeople WHERE ep_key ='".$key."')");
             $data = $reuslt->fetch_assoc();
             $lat =$data['lc_lat'];
             $long = $data["lc_long"]; 
         }else{
            querydata("UPDATE `location` SET  `lc_lat`=".$lat." ,`lc_long`=".$long.",accident =".$accidentstatus." WHERE `ep_id` = (SELECT ep_id from elderlypeople WHERE ep_key ='".$key."')");
         }
         if($accidentstatus == 1){
            $text = "คุณ ".$name." เกิดการล้ม ณ\nตำแหน่งที่เกิดการล้มปัจจุบัน \nพิกัด : ".(float)$lat. ",".(float)$long."\nhttp://maps.google.com/maps?q=".(float)$lat. ",".(float)$long."";
            print_r( notify_message(strval($text),strval($linetoken)));
            print_r( notify_message(strval($text),strval($linetoken1)));
            print_r( notify_message(strval($text),strval($linetoken2))); 
        }else{}
    } 
}
function setupstart($key,$lat,$long){
    $reuslt =querydata("SELECT  `ep_linetoken`,	ep_linetoken_1,	ep_linetoken_2,ep_name	  from elderlypeople WHERE `ep_key` = '".$key."'");
 
    if($reuslt->num_rows >0){
        $row = $reuslt->fetch_array();
        
        $linetoken=$row[0];
        $linetoken1=$row[1];
        $linetoken2=$row[2];
        $name = $row[3];
        if($lat==-1 || $long ==-1){
           $reuslt =  querydata("SELECT  `lc_lat`,`lc_long` FROM `location` WHERE `ep_id` = (SELECT ep_id from elderlypeople WHERE ep_key ='".$key."')");
            $data = $reuslt->fetch_assoc();
            $lat =$data['lc_lat'];
            $long = $data["lc_long"]; 

        }else{
            querydata("UPDATE `location` SET  `lc_lat`=".$lat." ,`lc_long`=".$long." WHERE `ep_id` = (SELECT ep_id from elderlypeople WHERE ep_key ='".$key."')");
        }
            $text = "คุณ ".$name." เปิดการใช้งานไม้เท้า ณ\nตำแหน่ง \nพิกัด : ".(float)$lat. ",".(float)$long."\nhttp://maps.google.com/maps?q=".(float)$lat. ",".(float)$long."";
            print_r( notify_message(strval($text),strval($linetoken)));
            print_r( notify_message(strval($text),strval($linetoken1)));
            print_r( notify_message(strval($text),strval($linetoken2)));
        }else{}
     
}
function notify_message($message,$token){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
}
function timestatus($key,$timestatus,$lat,$long){
    $reuslt =querydata("SELECT  `ep_linetoken`,	ep_linetoken_1,	ep_linetoken_2,ep_name	  from elderlypeople WHERE `ep_key` = '".$key."'");
    if($reuslt->num_rows >0){
        $row = $reuslt->fetch_array();
        
        $linetoken=$row[0];
        $linetoken1=$row[1];
        $linetoken2=$row[2];
        $name = $row[3];
        if($lat==-1 || $long ==-1){
            $reuslt =  querydata("SELECT  `lc_lat`,`lc_long` FROM `location` WHERE `ep_id` = (SELECT ep_id from elderlypeople WHERE ep_key ='".$key."')");
             $data = $reuslt->fetch_assoc();
             $lat =$data['lc_lat'];
             $long = $data["lc_long"]; 
         }else{
            querydata("UPDATE `location` SET  `lc_lat`=".$lat." ,`lc_long`=".$long.",accident =".$accidentstatus." WHERE `ep_id` = (SELECT ep_id from elderlypeople WHERE ep_key ='".$key."')");        
         }
         if($timestatus == 1){
            $text = "คุณ ".$name." ส่งข้อมูล ณ\nตำแหน่งไม้ปัจจุบัน \nพิกัด : ". (float)$lat. ",". (float)$long."\nhttp://maps.google.com/maps?q=". (float)$lat. ",". (float)$long."";
            print_r( notify_message(strval($text),strval($linetoken)));
            print_r( notify_message(strval($text),strval($linetoken1)));
            print_r( notify_message(strval($text),strval($linetoken2))); 
        }else{}
    } 
}
?>  
 