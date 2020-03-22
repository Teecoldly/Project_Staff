<?php 
session_start();
include "pagejs/mainscrip.php";
if(!isset($_SESSION["userlogin"])){
	header("Location: ../index.html");
 
}
if($_SESSION["Type"]!=2){
    header("Location: ../index.html");
}
     $result = querydata("SELECT * FROM `elderlypeople` WHERE user_id = '".$_SESSION['U_ID']."'");
 
    $data = $result->fetch_assoc();
    $data1=$data;
    $idpee = $data["ep_id"];
    $num;
    $num =0;
 
?>

<!doctype html>
<html class="no-js" lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>แสดงข้อมูลข้อมูลผู้สูงอายุ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		==========3================================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- summernote CSS
		============================================ -->
    <link rel="stylesheet" href="css/summernote/summernote.css">
    <!-- Range Slider CSS
		============================================ -->
    <link rel="stylesheet" href="css/themesaller-forms.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- bootstrap select CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="css/datapicker/datepicker3.css">
    <!-- Color Picker CSS
		============================================ -->
    <link rel="stylesheet" href="css/color-picker/farbtastic.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/chosen/chosen.css">
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="css/notification/notification.css">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <?php if(isset($_SESSION['userlogin']) &&  $_SESSION["Type"] =='2' ){ ?>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item  "><a href="#" data-toggle="dropdown" role="button" aria-expanded="true"
                                    class="nav-link dropdown-toggle"><span><i
                                            class="notika-icon notika-menus"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>ยินดีต้อนรับคุณ: <?php echo $_SESSION["userlogin"]; ?></h2>
                                    </div>



                                    <a href="pagejs/destory.php">
                                        <div class="hd-mg-tt">
                                            <h2> ออกจากระบบ</h2>
                                        </div>
                                    </a>
                                </div>
                    </div>
                    </li>
                    </ul>
                </div>
                <?php }?>
            </div>

        </div>
    </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <?php if(isset($_SESSION['userlogin']) &&  $_SESSION["Type"] =='2' ){ ?>

    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a href="#"><i class="notika-icon notika-house"></i> หน้าแรก</a>
                        </li>
                        <li><a href="editolder_pepole.php"><i
                                    class="notika-icon notika-mail"></i>แก้ไขข้อมูลผู้สูงอายุ</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <!-- Mobile Menu end -->
    <div class="mobile-menu-area mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">หน้าแรก</a>

                                </li>
                                <li><a data-toggle="collapse" data-target="#Charts"
                                        href="editolder_pepole.php">แก้ไขข้อมูลผู้สูงอายุ</a>

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area End-->
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-15">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-form"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>ข้อมูลผู้สูงอายุ</h2>
                                        <p>ข้อมูลผู้สูงอายุ</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap mg-t-30">
                            <div class="cmp-tb-hd cmp-int-hd">
                                <h2>ข้อมูลผู้สูงอายุ</h2>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">ชื่อจริง</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" id="Key" hidden="true"
                                                    value="<?php echo $data['ep_key'];?>">
                                                <input type="text" class="form-control input-sm"
                                                    placeholder="กรอกชื่อจริง" id="firstname"
                                                    value="<?php echo $data['ep_name'];?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">นามสกุล</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm"
                                                    placeholder="กรอกนามสกุล" id="lastname"
                                                    value="<?php echo $data['ep_lastname'];?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">วันเดือนปีเกิด</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_2">
                                                <div class="input-group date nk-int-st">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control"
                                                        placeholder="กรุณาเลือกวันเดือนปีเกิด"
                                                        value="<?php echo $data['ep_birthday'];?>" id="birthday"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">เพศ</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <div class="btn-group bootstrap-select">
                                                    <div class="dropdown-menu open" role="combobox">
                                                        <ul class="dropdown-menu inner" role="listbox"
                                                            aria-expanded="false">
                                                            <li data-original-index="0" class="selected"><a tabindex="0"
                                                                    class="" style="" data-tokens="null" role="option"
                                                                    aria-disabled="false" aria-selected="true"><span
                                                                        class="text">ชาย</span><span
                                                                        class="notika-icon notika-checked check-mark"></span></a>
                                                            </li>
                                                            <li data-original-index="1"><a tabindex="0" class=""
                                                                    style="" data-tokens="null" role="option"
                                                                    aria-disabled="false" aria-selected="false"><span
                                                                        class="text">หญิง</span><span
                                                                        class="notika-icon notika-checked check-mark"></span></a>
                                                            </li>

                                                        </ul>

                                                    </div><select class="selectpicker" tabindex="-98" id="sex">
                                                        <option value=1
                                                            <?php if($data["ep_sex"]==1){echo "selected='selected'";}?>
                                                            disabled>ชาย</option>
                                                        <option value=2
                                                            <?php if($data["ep_sex"]==2){echo "selected='selected'";}?>
                                                            disabled>หญิง</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">ส่วนสูง</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                                <div class="nk-int-st">
                                                    <input type="number" class="form-control input-sm" id="height"
                                                        placeholder="กรุณากรอกส่วนสูง"
                                                        value=<?php echo $data['ep_height'];?> disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">น้ำหนัก</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="number" class="form-control input-sm" id="weight"
                                                    placeholder="กรุณากรอกน้ำหนัก"
                                                    value=<?php echo $data['ep_weight'];?> disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">ที่อยู่</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                                    <div class="nk-int-st">
                                                        <textarea class="form-control" rows="5" id="adress"
                                                            placeholder="กรุณากรอกที่อยู่"
                                                            disabled>  <?php   echo htmlspecialchars($data['ep_adress']);?></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">รูปภาพ</label>
                                            </div>
                                            <?php if($data['ep_img']!=''){ ?>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">


                                                <div class="nk-int-st">
                                                    <img src="../images/imgolder/<?php   echo htmlspecialchars($data['ep_img']);?> "
                                                        alt="" width="340" height="480">
                                                </div>

                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm"> QR CODE แสดงรายละเอียด</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">


                                                <div class="nk-int-st">
                                                    <a href="../images/qrcode/<?php echo $data["ep_key"] ?>.png"
                                                        download>Downloads</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm"> Code ไม้เท้า : </label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">


                                                <div class="nk-int-st">
                                                    <a href="#"><?php echo $data["ep_key"] ?></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-element-list mg-t-30">
                                    <div class="cmp-tb-hd">
                                        <h2>***ข้อมูลการทานยา</h2>
                                        <p>ข้อมูลยาต่างๆ ตามช่วงเวลาแบ่งต่างที่ส่งข้อมูลถึงผู้ดูแลตามช่วงเวลา</p>
                                    </div>
                                    <div class="row">
                                        <?php 
                                        $sql = "select * from eventtime where ep_id = " .$idpee;
                                        $resulttime = querydata($sql);
                                  
                                        
                                      
                                        foreach ($resulttime  as $key =>  $rows) {
                                             
                                             if($rows["time_6"]!==''){echodata(6, $rows["time_6"]);}
                                             if($rows["time_7"]!==''){echodata(7, $rows["time_7"]);}
                                             if($rows["time_8"]!==''){echodata(8, $rows["time_8"]);}
                                             if($rows["time_9"]!==''){echodata(9, $rows["time_9"]);}
                                             if($rows["time_10"]!==''){echodata(10, $rows["time_10"]);}
                                             if($rows["time_11"]!==''){echodata(11, $rows["time_11"]);}
                                             if($rows["time_12"]!==''){echodata(12, $rows["time_12"]);}
                                             if($rows["time_13"]!==''){echodata(13, $rows["time_13"]);}
                                             if($rows["time_14"]!==''){echodata(14, $rows["time_14"]);}
                                             if($rows["time_15"]!==''){echodata(15, $rows["time_15"]);}
                                             if($rows["time_16"]!==''){echodata(16, $rows["time_16"]);}
                                             if($rows["time_17"]!==''){echodata(17, $rows["time_17"]);}
                                             if($rows["time_18"]!==''){echodata(18, $rows["time_18"]);}
                                             
                                             
                                        }

                                        function echodata ($data1,$data2)
                                        {
                                            global $num;
                                            $num ++;
                                            $objtable =     '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-t-30">'.
                                            '<div class="nk-int-mk">'.
                                            '<h2>ข้อมูลกินยา ณ เวลา  '.$data1 .' โมง  </h2>'.
                                            ' </div>'.
                                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">'.
                                            '<div class="nk-int-st">'.
                                            '<textarea class="form-control" rows="5"'.
                                            'placeholder="กรุณาข้อมูลยา" disabled>'.$data2.'</textarea>'.
                                            '</div>'.
                                            '</div>'.
                                            '</div>';
                                            echo $objtable ;
                                        }
                                        global $num;
                                        if($num==0){
                                             
                                     
                                        ?>
                                        <div class="alert-inner">

                                            <div class="alert-list">
                                                <div class="alert alert-danger alert-mg-b-0" role="alert">
                                                    <center>ไม่พบข้อมูลการบันทึกในระบบ</center>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-example-wrap mg-t-30">
                                    <div class="cmp-tb-hd cmp-int-hd">
                                        <h2>ข้อมูลผู้ดูแล</h2>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">ชื่อ</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                            placeholder="ชื่อผู้ดูแล" id="nameCaretaker"
                                                            value="<?php echo $data['ep_nameCaretaker'];?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">เบอร์โทร</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                            placeholder="กรอกเบอร์โทรที่สะดวกติดต่อ" id="numberphone"
                                                            value="<?php echo $data['ep_numberphone'];?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">เบอร์สำรอง 1</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                            placeholder="ไม่พบการกรองเบอร์สำรองใบระบบ"
                                                            id="numberphones1"
                                                            value="<?php echo $data1['ep_numberphone_1'];?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">เบอร์สำรอง 2</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                            placeholder="ไม่พบการกรองเบอร์สำรองใบระบบ"
                                                            id="numberphones2"
                                                            value="<?php echo $data1['ep_numberphone_2'];?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <?php if(isset($_SESSION['userlogin'])){ ?>
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Token Line </label>
                                                </div>
                                                <?php }?>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <?php if(isset($_SESSION['userlogin'])){ ?>
                                                        <input type="text" class="form-control input-sm"
                                                            placeholder="Token Line การในแจ้งเตือน" id="linetoken"
                                                            value="<?php echo $data['ep_linetoken'];?>" disabled>
                                                        <?php }?>
                                                        <input type="text" id="lat" hidden="true"
                                                            value="<?php echo $data['ep_lat'];?>" disabled>
                                                        <input type="text" id="lng" hidden="true"
                                                            value="<?php echo $data['ep_long'];?>">
                                                        <?php 
                                                              $result = querydata("SELECT lc_lat,lc_long from location where ep_id =".$idpee."");
                                                              $data = $result->fetch_assoc();
                                                     
                                                            ?>
                                                        <input type="text" id="lclat" hidden="true"
                                                            value="<?php echo $data['lc_lat'];?>" disabled>
                                                        <input type="text" id="lclng" hidden="true"
                                                            value="<?php echo $data['lc_long'];?>" disabled>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">สำรอง linetoken1</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                            placeholder="ไม่พบการกรอง Token line สำรองใบระบบ"" id="linetokens1"
                                                            value="<?php echo $data1['ep_linetoken_1'];?>" disabled>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">สำรอง linetoken2</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                            placeholder="ไม่พบการกรอง Token line สำรองใบระบบ" id="linetokens2"
                                                            value="<?php echo $data1['ep_linetoken_2'];?>" disabled>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-example-wrap mg-t-30">
                                    <div class="cmp-tb-hd cmp-int-hd">
                                        <h2>ตำแหน่งไม้ปัจจุบัน</h2>
                                    </div>
                                    <div class="google-map-single">
                                        <div id="map2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-example-wrap mg-t-30">
                                    <div class="cmp-tb-hd cmp-int-hd">
                                        <h2>ที่อยู่บ้านผู้สูงอายุ</h2>
                                    </div>
                                    <div class="google-map-single  ">
                                        <div id="googleMap"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Form Element area Start-->

    <!-- Dropzone area End-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>

    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!-- Input Mask JS
		============================================ -->
    <script src="js/jasny-bootstrap.min.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- rangle-slider JS
		============================================ -->
    <script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
    <script src="js/rangle-slider/rangle-active.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!--  color-picker JS
		============================================ -->
    <script src="js/color-picker/farbtastic.min.js"></script>
    <script src="js/color-picker/color-picker.js"></script>
    <!--  notification JS
		============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
    <!--  summernote JS
		============================================ -->
    <script src="js/summernote/summernote-updated.min.js"></script>
    <script src="js/summernote/summernote-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  chosen JS
		============================================ -->
    <script src="js/chosen/chosen.jquery.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
        ============================================ -->

    <script src="js/todo/jquery.todo.js"></script>

    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- google map -->


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-ZGQec4W3lncm-g8-QpR9fujYbnf2qQc&amp"> </script>

    <!--sweertalert 2 JS
        ============================================ -->
    <script src="../libary/sweetalert2/dist/sweetalert2.all.js"></script>
    <!--scrip-->
    <script src="pagejs/showdata.js"></script>



</body>

</html>