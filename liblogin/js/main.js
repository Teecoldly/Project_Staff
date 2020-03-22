
(function ($) {
    "use strict";

    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(e){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }
        if(check!=false){
            e.preventDefault();
            var username = $("#username").val();
            var password = $("#password").val();
 
            
            $.post("phplib/login.php",{login:1,username:username,password:password},
            function (data) {
  
             if(data!="success"){
                  
                Swal.fire({
                    type: 'error',
                    title: 'ไม่สามารถเข้าสู่ระบบได้',
                    text: 'เนื่องจาก username หรือ Password ไม่ถูกต้อง'
         
                  });
                  $("#username").val('');
                  $("#password").val('');
                  
             }else{
                
                Swal.fire({
                    type: 'success',
                    title: 'เข้าสู่ระบบสำเร็จ',
                    text: 'ล็อกอินสำเร็จ'
         
                  }).then((result) => {
                     location.href = 'main/showdata_pepole.php';
                  })
             }
            }
        );
        }else{
            return false;
        }
 
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    

})(jQuery);