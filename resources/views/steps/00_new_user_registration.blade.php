@extends('layouts.no_navbar')
@section('title', 'สมัครใหม่')

@section('content')
<div class="row" style="margin-top:30px;">
    <div class="col-md-12">
        <h2>สมัครใหม่</h2>
        <br />
        <div class="flat-well">
            <legend>ข้อมูลส่วนตัว</legend>
            <div class="row">
                <div class="col-md-3 col-xs-4">
                    <span class="help-block">คำนำหน้าชื่อ</span>
                    <div id="titleGroup">
                        <select id="title" name="title" class="form-control select select-primary select-block mbl">
                            <optgroup label="คำนำหน้าชื่อ">
                                <option value="0">ด.ช.</option>
                                <option value="1">ด.ญ.</option>
                                <option value="2">นาย</option>
                                <option value="3">นางสาว</option>
                                <option value="4">อื่นๆ</option>
                            </optgroup>
                        </select>
                    </div>
                    <div id="customtitleGroup" style="display:none;">
                        <input id="customtitle" name="customtitle" type="text" placeholder="คำนำหน้าชื่อ" class="form-control" />
                        <span class="small text-muted"><a href="#" id="cancelCustomTitleSelection"><i class="fa fa-times"></i> กลับไปเลือกคำนำหน้าชื่อปกติ</a></span>
                    </div>
                </div>
                <div class="col-md-4 col-xs-8" id="fnameGroup">
                    <span class="help-block">ชื่อ</span>
                    <input id="fname" name="fname" type="text" placeholder="ชื่อ" class="form-control" />
                </div>
                <div class="col-md-5 col-xs-12" id="lnameGroup">
                    <span class="help-block">นามสกุล</span>
                    <input id="lname" name="lname" type="text" placeholder="นามสกุล" class="form-control" />
                </div>
            </div>
            <!-- == -->
            <div class="row">
                <div class="col-md-3 col-xs-4">
                    <div id="customtitle_enGroup" style="display:none;">
                        <span class="help-block">คำนำหน้าชื่อ (ภาษาอังกฤษ)</span>
                        <input id="customtitle_en" name="customtitle_en" type="text" placeholder="Title" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4 col-xs-8" id="fname_enGroup">
                    <span class="help-block">ชื่อ (ภาษาอังกฤษ)</span>
                    <input id="fname_en" name="fname_en" type="text" placeholder="First name" class="form-control" />
                </div>
                <div class="col-md-5 col-xs-12" id="lname_enGroup">
                    <span class="help-block">นามสกุล (ภาษาอังกฤษ)</span>
                    <input id="lname_en" name="lname_en" type="text" placeholder="Last name" class="form-control" />
                </div>
            </div>
            <!-- == -->
            <div class="row">
                <div class="col-md-3" id="customGenderGroup" style="display:none;">
                    <span class="help-block">เพศ</span>
                    <select id="customGender" name="customGender" class="form-control select select-primary select-block mbl">
                        <optgroup label="เลือกเพศ">
                            <option value="0">ชาย</option>
                            <option value="1">หญิง</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col-md-12" id="citizenidGroup">
                    <span class="help-block">รหัสประจำตัวประชาชน</span>
                    <input id="citizenid" name="citizenid" type="text" placeholder="รหัสประจำตัวประชาชน 13 หลัก" class="form-control" />
                </div>
            </div>
            <!-- == -->
            <div class="row">
                <div class="col-md-12">
                    <span class="help-block">วัน เดือน ปีเกิด</span>
                    <div class="row">
                        <div class="col-xs-4">
                            <select id="birthdate" name="birthdate" style="width:100%;" class="form-control select select-primary select-block mbl">
                                <?php
                                    $date = 1;
                                    while($date <= 31){
                                        echo("<option value=\"$date\">$date</option>");
                                        $date++;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select id="birthmonth" name="birthmonth" style="width:100%;" class="form-control select select-primary select-block mbl">
                                <option value="1">มกราคม</option>
                                <option value="2">กุมภาพันธ์</option>
                                <option value="3">มีนาคม</option>
                                <option value="4">เมษายน</option>
                                <option value="5">พฤษภาคม</option>
                                <option value="6">มิถุนายน</option>
                                <option value="7">กรกฎาคม</option>
                                <option value="8">สิงหาคม</option>
                                <option value="9">กันยายน</option>
                                <option value="10">ตุลาคม</option>
                                <option value="11">พฤศจิกายน</option>
                                <option value="12">ธันวาคม</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select id="birthyear" name="birthyear" style="width:100%;" class="form-control select select-primary select-block mbl">
                                <?php
                                    $year = date("Y") + 543; // Assuming that "date" will be in Christian Era.
                                    $threshold = 30;
                                    if(config('uiconfig.mode') == 'province_quota'){
                                        $year-=13;
                                        $threshold = 5;
                                    }
                                    while($threshold >= 0){
                                        echo("<option value=\"$year\">$year</option>");
                                        $year -= 1;
                                        $threshold -= 1;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br />
        <div class="flat-well">
            <legend>ข้อมูลผู้ใช้</legend>
            <div class="row">
                <div class="col-md-12" id="emailGroup">
                    <span class="help-block">E-mail address</span>
                    <input id="email" name="email" type="email" placeholder="ที่อยู่อีเมล์ของนักเรียน" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="phoneGroup">
                    <span class="help-block">หมายเลขโทรศัพท์</span>
                    <input id="phone" name="phone" type="text" placeholder="หมายเลขโทรศัพท์ของนักเรียน" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="passwordGroup">
                    <span class="help-block">กำหนดรหัสผ่านเข้าสู่ระบบ</span>
                    <input id="password" name="password" type="password" placeholder="กำหนดรหัสผ่าน" class="form-control" />
                </div>
                <div class="col-md-6" id="password_confirmGroup">
                    <span class="help-block">ยืนยันรหัสผ่าน</span>
                    <input id="password_confirm" name="password_confirm" type="password" placeholder="กำหนดรหัสผ่านอีกครั้ง" class="form-control" />
                </div>
            </div>
            <br />
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <br />
                <span class="help-block">โปรดทำเครื่องหมายถูกในช่องด้านล่าง</span>
                <div class="g-recaptcha" data-sitekey="{{ Config::get('captcha.sitekey') }}"></div>
            </div>
        </div>
        <br />
        <a id="create_account" href="#" class="btn btn-primary btn-block btn-lg">สร้างบัญชีผู้สมัคร</a>
        <br />
        <a href="/" class="btn btn-default btn-block btn-lg">กลับไปหน้าหลัก</a>
        <br />
    </div>
</div>

<!-- Loading modal -->
<div id="plsWaitModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i> กรุณารอสักครู่
            </div>
        </div>
    </div>
</div>

@endsection

@section('additional_scripts')
<script src="/assets/js/bootbox.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>

    var usingCustomTitle = 0;
    var customTitleErrors = 0;

    $(function(){
        $("select").select2({dropdownCssClass: 'dropdown-inverse'});
        checkCustomTitleSelection();

        $('#plsWaitModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });

    })

    /* Custom Titles */
    $("#title").change(function(){
        checkCustomTitleSelection();
    })

    /* Live email validation */
    $("#email").keyup(function(){
        if(checkEmail($("#email").val())){
            $("#emailGroup").removeClass("has-warning");
            $("#emailGroup > .help-block > .fa").remove();
        }else{
            $("#emailGroup").addClass("has-warning");
            $("#emailGroup > .help-block > .fa").remove();
            $("#emailGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    });

    /* Validate Thai language name fields */
    $("#customtitle").keyup(function(){
        if(checkThai($("#customtitle").val())){
            $("#customtitleGroup").removeClass("has-warning");
            $("#customtitleGroup > .help-block > .fa").remove();
        }else{
            $("#customtitleGroup").addClass("has-warning");
            $("#customtitleGroup > .help-block > .fa").remove();
            $("#customtitleGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    });
    $("#fname").keyup(function(){
        if(checkThai($("#fname").val())){
            $("#fnameGroup").removeClass("has-warning");
            $("#fnameGroup > .help-block > .fa").remove();
        }else{
            $("#fnameGroup").addClass("has-warning");
            $("#fnameGroup > .help-block > .fa").remove();
            $("#fnameGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    });
    $("#lname").keyup(function(){
        if(checkThai($("#lname").val())){
            $("#lnameGroup").removeClass("has-warning");
            $("#lnameGroup > .help-block > .fa").remove();
        }else{
            $("#lnameGroup").addClass("has-warning");
            $("#lnameGroup > .help-block > .fa").remove();
            $("#lnameGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    });

    /* Validate English language name fields */
    $("#customtitle_en").keyup(function(){
        if(checkAlphanumeric($("#customtitle_en").val())){
            $("#customtitle_enGroup").removeClass("has-warning");
            $("#customtitle_enGroup > .help-block > .fa").remove();
        }else{
            $("#customtitle_enGroup").addClass("has-warning");
            $("#customtitle_enGroup > .help-block > .fa").remove();
            $("#customtitle_enGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    });
    $("#fname_en").keyup(function(){
        if(checkAlphanumeric($("#fname_en").val())){
            $("#fname_enGroup").removeClass("has-warning");
            $("#fname_enGroup > .help-block > .fa").remove();
        }else{
            $("#fname_enGroup").addClass("has-warning");
            $("#fname_enGroup > .help-block > .fa").remove();
            $("#fname_enGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    });
    $("#lname_en").keyup(function(){
        if(checkAlphanumeric($("#lname_en").val())){
            $("#lname_enGroup").removeClass("has-warning");
            $("#lname_enGroup > .help-block > .fa").remove();
        }else{
            $("#lname_enGroup").addClass("has-warning");
            $("#lname_enGroup > .help-block > .fa").remove();
            $("#lname_enGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    });

    /* Live password validation */
    $("#password").keyup(function(){
        checkPasswordFields();
    });
    $("#password_confirm").keyup(function(){
        checkPasswordFields();
    });

    function checkPasswordFields(){
        var pswdInput = $("#password").val();
        var pswdConfirmInput = $("#password_confirm").val();
        if(pswdInput == pswdConfirmInput){
            $("#passwordGroup").removeClass("has-warning");
            $("#password_confirmGroup").removeClass("has-warning");
            $("#passwordGroup > .help-block > .fa").remove();
            $("#password_confirmGroup > .help-block > .fa").remove();
        }else{
            $("#passwordGroup").addClass("has-warning");
            $("#password_confirmGroup").addClass("has-warning");
            $("#passwordGroup > .help-block > .fa").remove();
            $("#password_confirmGroup > .help-block > .fa").remove();
            $("#passwordGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
            $("#password_confirmGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    }

    /* Live citizenID validation */
    $("#citizenid").keyup(function(){
        if(checkCitizenID($("#citizenid").val())){
            $("#citizenidGroup").removeClass("has-warning");
            $("#citizenidGroup > .help-block > .fa").remove();
        }else{
            $("#citizenidGroup").addClass("has-warning");
            $("#citizenidGroup > .help-block > .fa").remove();
            $("#citizenidGroup > .help-block").prepend("<i class=\"fa fa-exclamation-circle\"></i> ");
        }
    });

    /* Cancellation of custom title */
    $("#cancelCustomTitleSelection").click(function(e){
        e.preventDefault();
        $("#title").val("0");
        $("#title").change();
    });

    function checkCustomTitleSelection(){
        if($("#title").val() == 4){
            // Custom title
            $("#title").removeClass("select-block");
            $("#customtitleGroup").show();
            $("#customtitle_enGroup").show();
            $("#customGenderGroup").show();
            $("#citizenidGroup").removeClass("col-md-12").addClass("col-md-9");
            $("#titleGroup").hide();
            usingCustomTitle = 1;
        }else{
            // Normal
            $("#title").addClass("select-block");
            $("#customtitleGroup").hide();
            $("#customtitle_enGroup").hide();
            $("#customGenderGroup").hide();
            $("#citizenidGroup").removeClass("col-md-9").addClass("col-md-12");
            $("#titleGroup").show();
            usingCustomTitle = 0;
        }
    }

    /* Submit application form */
    $("#create_account").click(function(e){

        $('#plsWaitModal').modal('show');

        e.preventDefault();
        var hasErrors = 0;

        // First, check email:
        if(checkEmail($("#email").val())){
            $("#emailGroup").removeClass("has-error");
        }else{
            $("#emailGroup").addClass("has-error");
            hasErrors += 1;
        }

      // Check citizen ID:
        if(checkCitizenID($("#citizenid").val())){
            $("#citizenidGroup").removeClass("has-error");
        }else{
            $("#citizenidGroup").addClass("has-error");
            hasErrors += 1;
        }

        // Check password:
        var pswdInput = $("#password").val();
        var pswdConfirmInput = $("#password_confirm").val();
        if(pswdInput == pswdConfirmInput){
            if(pswdInput != "" && pswdConfirmInput != ""){
                $("#passwordGroup").removeClass("has-error");
                $("#password_confirmGroup").removeClass("has-error");
            }else{
                $("#passwordGroup").addClass("has-error");
                $("#password_confirmGroup").addClass("has-error");
                hasErrors += 1;
            }
        }else{
            $("#passwordGroup").addClass("has-error");
            $("#password_confirmGroup").addClass("has-error");
            hasErrors += 1;
        }

        // Check for empty fields:
        if($("#fname").val() != ""){
            $("#fnameGroup").removeClass("has-error");
        }else{
            $("#fnameGroup").addClass("has-error");
            hasErrors += 1;
        }

        if($("#lname").val() != ""){
            $("#lnameGroup").removeClass("has-error");
        }else{
            $("#lnameGroup").addClass("has-error");
            hasErrors += 1;
        }

        if($("#fname_en").val() != ""){
            $("#fname_enGroup").removeClass("has-error");
        }else{
            $("#fname_enGroup").addClass("has-error");
            hasErrors += 1;
        }

        if($("#lname_en").val() != ""){
            $("#lname_enGroup").removeClass("has-error");
        }else{
            $("#lname_enGroup").addClass("has-error");
            hasErrors += 1;
        }

        if($("#phone").val() != ""){
            $("#phoneGroup").removeClass("has-error");
        }else{
            $("#phoneGroup").addClass("has-error");
            hasErrors += 1;
        }

        // If using custom titles, also check the custom title fields:
        if(usingCustomTitle == 1){
            if($("#customtitle").val() != ""){
                $("#customtitleGroup").removeClass("has-error");
                customTitleErrors -= 1;
            }else{
                $("#customtitleGroup").addClass("has-error");
                hasErrors += 1;
                customTitleErrors += 1;
            }

            if($("#customtitle_en").val() != ""){
                $("#customtitle_enGroup").removeClass("has-error");
                customTitleErrors -= 1;
            }else{
                $("#customtitle_enGroup").addClass("has-error");
                hasErrors += 1;
                customTitleErrors += 1;
            }
        }

        // Prepare gender data
        if(usingCustomTitle == 1){
            var titleToSend = $("#customtitle").val();
            var titleToSend_en = $("#customtitle_en").val();
            var genderToSend = $("#customGender").val();
        }else{
            var genderToSend;
            var titleToSend = $("#title").val();
            var titleToSend_en =  $("#title").val();
            switch(parseInt($("#title").val())){
                case 0:
                    genderToSend = 0;
                break;
                case 1:
                    genderToSend = 1;
                break;
                case 2:
                    genderToSend = 0;
                break;
                case 3:
                    genderToSend = 1;
                break;
                default:
                    genderToSend = 0;
            }
        }

        @if(Config::get('app.debug') === true)
            console.log("[DBG/LOG] Total errors: " + hasErrors);
        @endif

        captchaResponse = grecaptcha.getResponse();

        if(hasErrors == 0){
            // Green across the board, and ready for action!
            $.ajax({
                url: '/api/v1/account/create',
                data: {
                     _token: csrfToken,
                     customtitle: usingCustomTitle,
                     title: titleToSend,
                     fname: $("#fname").val(),
                     lname: $("#lname").val(),
                     title_en: titleToSend_en,
                     fname_en: $("#fname_en").val(),
                     lname_en: $("#lname_en").val(),
                     gender: genderToSend,
                     citizenid: $("#citizenid").val(),
                     birthdate: $("#birthdate").val(),
                     birthmonth: $("#birthmonth").val(),
                     birthyear: $("#birthyear").val(),
                     email: $("#email").val(),
                     phone: $("#phone").val(),
                     password: $("#password").val(),
                     password_confirm: $("#password_confirm").val(),
                     recaptcha: captchaResponse
                },
                error: function (request, status, error) {
                    $('#plsWaitModal').modal('hide');
                    var response = JSON.parse(request.responseText);
                    switch(request.status){
                        case 422:
                            bootbox.alert("<i class='fa fa-exclamation-triangle text-warning'></i> มีข้อผิดพลาดของข้อมูล โปรดตรวจสอบรูปแบบข้อมูลอีกครั้ง");
                        break;
                        case 409:
                            bootbox.alert("<i class='fa fa-exclamation-triangle text-warning'></i> นักเรียนเคยทำการลงทะเบียนไปแล้ว โปรดเข้าสู่ระบบเพื่อแก้ไขข้อมูล");
                        break;
                        default:
                            bootbox.alert("<i class='fa fa-exclamation-triangle text-warning'></i> เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาลองใหม่อีกครั้ง");
                    }
                },
                dataType: 'json',
                success: function(data) {
                    console.log("AJAX complete");
                    window.location.replace("/application/home");
                },
                type: 'POST'
            });
        }else{
            // NOPE.
            $('#plsWaitModal').modal('hide');
            bootbox.alert("<i class='fa fa-exclamation-triangle text-warning'></i> มีข้อผิดพลาดของข้อมูล โปรดตรวจสอบรูปแบบข้อมูลอีกครั้ง");
        }

    })


</script>
@endsection
