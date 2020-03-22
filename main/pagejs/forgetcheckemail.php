<?php 
include_once "mainscrip.php";
 
 
require("../../libary/lib-email/PHPMailerAutoload.php");
$email = $_REQUEST["email"];
$sql = "select * from userinfo where email = '".$email."'";
 
$reuslt = querydata($sql);
 
    if($reuslt->num_rows==0){
    echo 0; 
    }else{
        $row = $reuslt->fetch_array();
       
        savefgid($row[0]);
        echo emailsend($email ,savefgid($row[0]),$row[4]);
    }
function emailsend($email ,$key,$name){
    header('Content-Type: text/html; charset=utf-8');

    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;


    $gmail_username = "replyteecoldly@gmail.com"; // gmail ที่ใช้ส่ง
    $gmail_password = "amtvvkzromhboyjw"; // รหัสผ่าน gmail
    // ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


    $sender = "replyteecoldly@gmail.com"; // ชื่อผู้ส่ง
    $email_sender = "replyteecoldly@gmail.com"; // เมล์ผู้ส่ง 
    $email_receiver = $email; // เมล์ผู้รับ ***

    $subject = "เปลี่ยนรหัสผ่าน"; // หัวข้อเมล์


    $mail->Username = $gmail_username;
    $mail->Password = $gmail_password;
    $mail->setFrom($email_sender, $sender);
    $mail->addAddress($email_receiver);
    $mail->Subject = $subject;

    $email_content = ' <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
               <h1 style="background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;" >
                Password Resetting
               </h1>
               <div style="padding:20px;">
                <h2>สวัสดีคุณ:'.$name.'</h2>
                   <div>				
                       <h2>การกู้รหัสผ่าน สำหรับ การเข้าใช้เข้าสู่ระบบ: <strong style="color:#0000ff;"></strong></h2>
                       <a href="https://iti.teecoldly.me/main/resetpassword?key='.$key.'" target="_blank">
                           <h1><strong style="color:#3c83f9;"> >> กรุณาคลิ๊กที่นี่ เพื่อตั้งรหัสผ่านใหม่<< </strong> </h1>
                       </a>
                   </div>
                   <div style="margin-top:30px;">
                       <hr>
                       <address>
                           <h4>ติดต่อสอบถาม</h4>
                           <p>Staff-notification</p>
                           <p>www.facebook.com/viptee</p>
                       </address>
                   </div>
               </div>
               <div style="background: #3b434c;color: #a2abb7;padding:30px;">
                   <div style="text-align:center"> 
                         Staff-notification
                   </div>
               </div>
           </body> 
    </html>';

    //  ถ้ามี email ผู้รับ
    if($email_receiver){
        $mail->msgHTML($email_content);


        if (!$mail->send()) {  // สั่งให้ส่ง email

            // กรณีส่ง email ไม่สำเร็จ
            echo "ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง";
            //echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
        }else{
            // กรณีส่ง email สำเร็จ
            echo "ระบบได้ส่งข้อความไปเรียบร้อย";
        }	
    }

}

function savefgid($id)
{
 
    date_default_timezone_set('Asia/Bangkok');
    $datetime =  getdate();
    $time=  $datetime["hours"].":".$datetime["minutes"].":".$datetime["seconds"];
    $date= $datetime["mday"]."/".$datetime["mon"]."/".$datetime["year"];
    $sql = "select * from fgemailtb where user_id = ".$id ;
    $reuslt  = querydata($sql);
    
    $key = md5($id.$date.$time);
    if ($reuslt->num_rows>0){
        $sql = "UPDATE `fgemailtb` SET  keymd5  ='". $key ."' ,datetime=now() WHERE  `user_id` =  ".$id;
        querydata($sql);
        return $key;
    }else{
        $sql ="INSERT INTO `fgemailtb`(  `user_id`, `keymd5` ) VALUES  (".$id.",'". $key ."')";
     
        querydata($sql);
        return $key;
    }
}
?>