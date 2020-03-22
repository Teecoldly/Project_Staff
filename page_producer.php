<?php 
include "phplib/producer.php";
$cons = new producer();
$key = $cons->createuser(1234);
 

?>
<!doctype html>
<html lang="en">
<style>
@media print {
  #hide {
  	display: none;
  }
}
</style>
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-4"></div>
            
                <div class="col-4" id='hide'>
                    <button type="submit" class="btn btn-primary" id ="reload"> เพิ่มข้อมูลในระบบใหม่</button>
                    <button type="submit" class="btn btn-success" id="print">พิมพ์ออกรายงาน</button>
               
                </div>
            <div class="col-4"></div>
        </div>
        <div id='report'>
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-12 ">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>
                                        <center>QECODE(สำหรับแสดงข้อมูลผู้ป่วย)<center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"> <?php  echo $key;?></td>
                                    <td>1234</td>
                                    <td><img src="images/qrcode/<?php echo $key;?>.png" class="rounded mx-auto d-block"
                                            alt="..."></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
<script src="jslib/producer.js"></script>
</body>

</html>