$(function () {
    $(document).on("click", "#senddata", function (e) {
        e.preventDefault();
 
        
        var  email = $("#email").val();
        if(email == ''){
            Swal.fire({
                type: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'กรุณากรอกอีเมล์',
            })
        }
        else{
            $.post("pagejs/forgetcheckemail.php", {email:email},
                function (result) {
                    if(result =='0'){
                        Swal.fire({
                            type: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'ไม่พบอีเมล์ในระบบกรุณาลองใหม่อีกครั้ง',
                        })
                    }else{
                        Swal.fire({
                            type: 'success',
                            title: 'ส่งอีเมล์สำเร็จ',
                            text: 'กรุณาตรวจสอบในกล่องจดหมายอีเมล์',
                        })
                    }
                }              
            );
        }
    });
});        