$(function () {
    var lat = $("#lat").val();
    var lng = $("#lng").val();
    userdfinfo = $("#userinfo").val();
    email = $("#emailuser").val();
    initialize(lat, lng);
    var markersmap;

    function initialize(lat = 13.847860, long = 100.604274) {
        var myLatlng = new google.maps.LatLng(lat, long);
        var myOptions = {
            zoom: 15,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
        addMarker(myLatlng, 'ตำแหน่งที่อยู่', map);
        var el = document.getElementById('googleMap');
        if (el) {
            map.addListener('click', function (event) {
                markersmap.setMap(null);
                addMarker(event.latLng, 'ตำแหน่งที่อยู่', map);
                $('#lat').val(event.latLng.lat());
                $('#lng').val(event.latLng.lng());
            });
        }

    }

    function addMarker(latlng, title, map) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: title,
            draggable: true
        });
        markersmap = marker;
        marker.addListener('drag', function (event) {
            $('#lat').val(event.latLng.lat());
            $('#lng').val(event.latLng.lng());
        });
        marker.addListener('dragend', function (event) {
            $('#lat').val(event.latLng.lat());
            $('#lng').val(event.latLng.lng());
        });
    }
    $(document).on("click", "#savedata", function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'ต้องการบันทึกข้อมูลหรือไม่ ',

            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'บันทึก'
        }).then((result) => {


            if (result.value) {
                var checklist = {
                    ntpassword: $("#ntpassword").hasClass("d-none"),
                    ntname: $("#ntname").hasClass("d-none"),
                    ntemail: $("#ntemail").hasClass("d-none"),
                    ntfirstname: $("#ntfirstname").hasClass("d-none"),
                    ntlastname: $("#ntlastname").hasClass("d-none"),
                    ntbirthday: $("#ntbirthday").hasClass("d-none"),
                    ntheight: $("#ntheight").hasClass("d-none"),
                    ntweight: $("#ntweight").hasClass("d-none"),
                    ntadress: $("#ntadress").hasClass("d-none"),
                    ntimg: $("#ntimg").hasClass("d-none"),
                    ntnameCaretaker: $("#ntnameCaretaker").hasClass("d-none"),
                    ntnumberphone: $("#ntnumberphone").hasClass("d-none"),
                    ntlinetoken: $("#ntlinetoken").hasClass("d-none"),
                    ntemail1: $("#ntemail1").hasClass("d-none"),
                    ntuserinfo1: $("#ntuserinfo1").hasClass("d-none"),

                    ntlinetokens2: $("#ntlinetokens2").hasClass("d-none"),
                    ntlinetokens1: $("#ntlinetokens1").hasClass("d-none"),
                    ntlinetoken: $("#ntlinetoken").hasClass("d-none"),
                    ntlinetoken1:$("#ntlinetoken1").hasClass("d-none"),
                    ntnumberphones2_1:$("#ntnumberphones2_1").hasClass("d-none"),
                    ntnumberphones2_2:$("#ntnumberphones2_2").hasClass("d-none"),
                    ntnumberphones1:$("#ntnumberphones1").hasClass("d-none"),
                }
                var datacheck = 0;
                $.each(checklist, function (index, value) {
                    if (value == false) {
                        datacheck++;
                    }
                });

                var data = {
                    uid: $("#uid").val(),
                    userinfo:$("#userinfo").val(),
                    passwordlogin: $("#passwordlogin").val(),
                    name: $("#name").val(),
                    email: $("#emailuser").val(),
                    key: $("#Key").val(),
                    firstname: $("#firstname").val(),
                    lastname: $("#lastname").val(),
                    birthday: $("#birthday").val(),
                    sex: $("#sex").val(),
                    height: $("#height").val(),
                    weight: $("#weight").val(),
                    adress: $("#adress").val(),
                    nameCaretaker: $("#nameCaretaker").val(),
                    numberphone: $("#numberphone").val(),
                    numberphones1:$("#numberphones1").val(),
                    numberphones2:$("#numberphones2").val(),
                    linetoken: $("#linetoken").val(),
                    linetokens1:$("#linetokens1").val(),
                    linetokens2:$("#linetokens2").val(),
                    lat: $("#lat").val(),
                    long: $("#lng").val(),
                    img: $('#img')[0].files[0]
                }

                if (datacheck > 0) {
                    Swal.fire({
                        type: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'กรุณากรอกข้อมูลให้ครบถ้วม',

                    })


                } else {
                    var successcheck = 1;
                    datatimeevent = {};
                    for (var i = 6; i <= 18; i++) {
                        if (geteventtime(i) == 0) {
                            Swal.fire({
                                title: 'กรอกข้อมูลทานยาไม่ครบถ้วน ',
                                type: 'warning',
                            })
                            successcheck = 0;
                            break;
                        }
                    }


                    if (successcheck == 1) {

                        data["timeevent"] = JSON.stringify(datatimeevent);
                        var form = new FormData;
                        $.each(data, function (index, value) {
                            form.append(index, value)
                        });

                        $.ajax({
                            type: "post",
                            url: "pagejs/editolderscripy_pepole.php ",
                            data: form,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (response) {

                             
                                
                                if (response == "success") {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'บันทึกข้อมูลสำเร็จ'


                                    }).then((result) => {
                                        if (result.value) {
                                            location.href = 'showdata_pepole.php';
                                        }
                                    });

                                } else {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'เกิดข้อผิดพลาด',
                                        text: 'บันทึกข้อมูลไม่สำเร็จ'

                                    })
                                }


                            }
                        });

                    }

                }
            }
        })

    });
    $(document).on("click", "#cencel", function (e) {
        e.preventDefault();


    });

    $(document).on("click", "#addeventtime", function (e) {
        e.preventDefault();
        timedata = [];
        timeshow = "";
        $.each($("#timeevent option:selected"), function () {

            timedata.push($(this).val());

        });
        var sizetimedata = timedata.length;


        for (var i = 6; i <= 18; i++) {
            check = 0;
            for (var b = 0; b < sizetimedata; b++) {

                if (timedata[b] == i) {
                    check = 1;



                    if ($("#deltime" + i).length == 0) {
                        timeshow += '' +
                            '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-t-30" id="deltime' + i + '">' +
                            '<div class="nk-int-mk">' +
                            '<h2>แจ้งเตือน ณ เวลา  ' + i + ' โมง  </h2>' +
                            ' </div>' +
                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">' +
                            '<div class="nk-int-st">' +
                            '<textarea class="form-control" rows="5"  id="eventtime' + i + '"' +
                            'placeholder="กรุณาข้อมูลยา"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    }

                }
            }
            if (check == 0) {
                if ($("#deltime" + i) != 0) {
                    $("#deltime" + i).remove();
                }
            }
        }

        $("#datatimeevent").append(timeshow);


    });

    function geteventtime(idcheck) {
        if ($("#eventtime" + idcheck).val() == '' && $("#deltime" + idcheck).length != 0) {
            return 0;
        } else if ($("#deltime" + idcheck).length != 0) {
            datatimeevent["time_" + idcheck] = $("#eventtime" + idcheck).val();
            return 1;
        }
    }
    $("#userinfo").keyup(function (e) {
        var text = $("#userinfo").val();
        if (text != '') {
            $("#ntuserinfo").removeClass("row ").addClass("row d-none");
            if (text != userdfinfo) {
                $.post("pagejs/checkusername.php", {
                        username: text
                    },
                    function (data) {


                        if (data == 1) {
                            $("#ntuserinfo1").removeClass("row d-none").addClass("row ");

                        } else {
                            $("#ntuserinfo1").removeClass("row ").addClass("row d-none");
                        }
                    }
                );
            } else {
                $("#ntuserinfo1").removeClass("row ").addClass("row d-none");
            }

        } else {
            $("#ntuserinfo").removeClass("row d-none").addClass("row ");

        }

    });
    $("#passwordlogin").keyup(function (e) {
        var text = $("#passwordlogin").val();
        if (text != '') {
            $("#ntpassword").removeClass("row ").addClass("row d-none");

        } else {
            $("#ntpassword").removeClass("row d-none").addClass("row ");
        }
    });
    $("#name").keyup(function (e) {
        var text = $("#name").val();
        if (text != '') {
            $("#ntname").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntname").removeClass("row d-none").addClass("row ");
        }
    });
    $("#emailuser").keyup(function (e) {
        var text = $("#emailuser").val();
        if (validateEmail(text)) {
            $("#ntemail").removeClass("row ").addClass("row d-none");
            if (text != email) {
                $.post("pagejs/checkemail.php", {
                        email: text
                    },
                    function (data) {
                        if (data == 1) {
                            $("#ntemail1").removeClass("row d-none").addClass("row ");

                        } else {
                            $("#ntemail1").removeClass("row ").addClass("row d-none");
                        }
                    });
            } else {
                $("#ntemail1").removeClass("row ").addClass("row d-none");
            }

        } else {
            $("#ntemail1").removeClass("row ").addClass("row d-none");
            $("#ntemail").removeClass("row d-none").addClass("row ");

        }

    });
    $("#firstname").keyup(function (e) {
        var text = $("#firstname").val();
        if (text != '') {
            $("#ntfirstname").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntfirstname").removeClass("row d-none").addClass("row ");

        }

    });
    $("#lastname").keyup(function (e) {
        var text = $("#lastname").val();
        if (text != '') {
            $("#ntlastname").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntlastname").removeClass("row d-none").addClass("row ");

        }

    });
    $("#height").keyup(function (e) {
        var text = $("#height").val();


        if (text >= 100 && !text.isInteger) {
            $("#ntheight").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntheight").removeClass("row d-none").addClass("row ");

        }

    });
    $("#height").scroll(function () {
        var text = $("#height").val();


        if (text >= 100 && !text.isInteger) {
            $("#ntheight").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntheight").removeClass("row d-none").addClass("row ");

        }

    });
    $("#weight").keyup(function (e) {
        var text = $("#weight").val();


        if (text >= 10 && !text.isInteger) {
            $("#ntweight").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntweight").removeClass("row d-none").addClass("row ");

        }

    });
    $("#weight").scroll(function (e) {
        var text = $("#weight").val();


        if (text >= 10 && !text.isInteger) {
            $("#ntweight").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntweight").removeClass("row d-none").addClass("row ");

        }

    });
    var _URL = window.URL || window.webkitURL;
    $("#img").change(function (e) {
        var file, img, h, w;

        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {

                var height = this.height;
                var width = this.width;
                console.log(height + ' ' + width);

                if (height > 1000 && width > 1000) {
                    $("#ntimg").removeClass("row d-none").addClass("row ");
                    return;
                } else {
                    $("#ntimg").removeClass("row ").addClass("row d-none");

                    return;
                }

            };


            img.src = _URL.createObjectURL(file);
        }
    });
    $("#adress").mouseout(function (e) {
        var text = $("#adress").val();
        if (text != '') {
            $("#ntadress").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntadress").removeClass("row d-none").addClass("row ");

        }

    });
    $("#nameCaretaker").mouseout(function (e) {
        var text = $("#nameCaretaker").val();
        if (text != '') {
            $("#ntnameCaretaker").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntnameCaretaker").removeClass("row d-none").addClass("row ");

        }

    });
    $("#linetoken").mouseout(function (e) {
        var text = $("#linetoken").val();
        if (text != '') {
            $("#ntlinetoken").removeClass("row ").addClass("row d-none");
            $.post("pagejs/checkline.php", {
                    textbox: "ทดสอบการส่งข้อมูลจากช่อง Token Line ",
                    linetoken: text
                },
                function (data) {
          

                    if (data == 1) {
                        $("#ntlinetoken1").removeClass("row ").addClass("row d-none");
                        $("#ntlinetoken").removeClass("row ").addClass("row d-none");
                    } else {
                        $("#ntlinetoken1").removeClass("row d-none").addClass("row ");
                        $("#ntlinetoken").removeClass("row ").addClass("row d-none");
                    }
                }
            );
        } else {
            $("#ntlinetoken1").removeClass("row ").addClass("row d-none");
            $("#ntlinetoken").removeClass("row d-none").addClass("row ");
        }

    });
    $("#linetokens1").change(function (e) {

        var text = $("#linetokens1").val()
        if (text != '') {
            $.post("pagejs/checkline.php", {
                    textbox: "ทดสอบการส่งข้อมูลจากช่อง Token Line สำรอง 1 ",
                    linetoken: text
                },
                function (data) {


                    if (data != 1) {
                   
                        $("#ntlinetokens1").removeClass("row d-none").addClass("row ");
                    }else{
                   
                        $("#ntlinetokens1").removeClass("row ").addClass("row d-none");
                    }
                }
            );


        } else {
        
            $("#ntlinetokens1").removeClass("row ").addClass("row d-none");
            
        }
    });
  
    $("#linetokens2").change(function (e) {

        var text = $("#linetokens2").val()
     
        if (text != '') {
                
                $.post("pagejs/checkline.php", {
                        textbox: "ทดสอบการส่งข้อมูลจากช่อง Token Line สำรอง 2 ",
                        linetoken: text
                    },
                    function (data) {


                        if (data != 1) {
                     
                            $("#ntlinetokens2").removeClass("row d-none").addClass("row ");
                        }else{
                   
                            $("#ntlinetokens2").removeClass("row ").addClass("row d-none");
                        }
                    }
                );
          



        } else {
    
            $("#ntlinetokens2").removeClass("row ").addClass("row d-none");
        }
    });
    $("#numberphone").keyup(function (e) {
        var text = $("#numberphone").val()
        if (text.length == 10 && !Number.isInteger(text)) {
            $("#ntnumberphone").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntnumberphone").removeClass("row d-none").addClass("row ");
        }
    });
    $("#numberphones1").keyup(function (e) {
        var text = $("#numberphones1").val()
        if (text != '') {
            if (text.length == 10 && !Number.isInteger(text)) {
                if ($("#numberphone").val() == text) {
                    $("#ntnumberphones1_1").removeClass("row d-none").addClass("row ");
                } else {
                
                    $("#ntnumberphones1_1").removeClass("row ").addClass("row d-none");
                    $("#ntnumberphones1").removeClass("row ").addClass("row d-none");
                }

            } else {
                $("#ntnumberphones1_1").removeClass("row ").addClass("row d-none");
                $("#ntnumberphones1").removeClass("row d-none").addClass("row ");
            }
        } else {
            $("#ntnumberphones1_1").removeClass("row ").addClass("row d-none");
            $("#ntnumberphones1").removeClass("row ").addClass("row d-none");
        }

        // 

    });
    $("#numberphones2").keyup(function (e) {
        var text = $("#numberphones2").val()
        if (text != '') {
            if (text.length == 10 && !Number.isInteger(text)) {
                if ($("#numberphone").val() == text || $("#numberphones1").val() == text) {
                    $("#ntnumberphones2_2").removeClass("row d-none").addClass("row ");
                   
                    
                } else {

                    $("#ntnumberphones2_2").removeClass("row ").addClass("row d-none");
                    $("#ntnumberphones2_1").removeClass("row ").addClass("row d-none");
                }

            } else {
                $("#ntnumberphones2_2").removeClass("row ").addClass("row d-none");
                $("#ntnumberphones2_1").removeClass("row d-none").addClass("row ");
            }
        } else {
            $("#ntnumberphones2_2").removeClass("row ").addClass("row d-none");
            $("#ntnumberphones2_1").removeClass("row ").addClass("row d-none");
        }

        // 

    });
    $("#birthday").change(function (e) {
        e.preventDefault();
        var birthday = $("#birthday").val();


        var a = age(new Date(birthday));


        if (a.years > 0) {
            $("#ntbirthday").removeClass("row ").addClass("row d-none");
        } else {
            $("#ntbirthday").removeClass("row d-none").addClass("row ");
        }
    });



    function alerterror(text) {
        toastr["error"](text)
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
});


function age(dob, today) {
    var today = today || new Date(),
        result = {
            years: 0,
            months: 0,
            days: 0,
            toString: function () {
                return (this.years ? this.years + ' ปี ' : '') +
                    (this.months ? this.months + ' เดือน ' : '') +
                    (this.days ? this.days + ' วัน' : '');
            }
        };
    result.months =
        ((today.getFullYear() * 12) + (today.getMonth() + 1)) -
        ((dob.getFullYear() * 12) + (dob.getMonth() + 1));
    if (0 > (result.days = today.getDate() - dob.getDate())) {
        var y = today.getFullYear(),
            m = today.getMonth();
        m = (--m < 0) ? 11 : m;
        result.days += [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][m] +
            (((1 == m) && ((y % 4) == 0) && (((y % 100) > 0) || ((y % 400) == 0))) ?
                1 : 0);
        --result.months;
    }
    result.years = (result.months - (result.months % 12)) / 12;
    result.months = (result.months % 12);
    return result;
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}