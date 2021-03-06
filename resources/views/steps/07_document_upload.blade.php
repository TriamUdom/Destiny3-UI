@extends('layouts.master')

@section('title', 'อัพโหลดเอกสารประกอบ')

@section('content')
<legend><i class="fa fa-upload"></i> อัพโหลดเอกสารประกอบ <i class="fa fa-spinner fa-spin text-muted pull-right" style="display:none;" id="loadingSpinner"></i></legend>
@if(!empty($error))
<div class="row">
    <div class="col-xs-12">
        <span class="text-warning"><i class="fa fa-exclamation-circle"></i>เกิดข้อผิดพลาด: <b>{{ $error }}</b></span>
    </div>
</div>
@endif
อัพโหลดเอกสารครั้งล่าสุด : {{ ($latestDocumentSubmission !== false) ? $latestDocumentSubmission : 'ยังไม่เคยอัพโหลดเอกสาร' }}
<div class="row">
    <div class="col-md-6">
        <b>รูปถ่าย</b> ขนาด 2 นิ้ว (รูปถ่ายไม่เกิน 6 เดือน)
        <form action="/api/v1/applicant/documents_upload/image" class="dropzone" id="filePicture">
            {{ csrf_field() }}
            <input type="hidden" name="upload_token" value="{{ $upload_token }}">
        </form>
    </div>
    <div class="col-md-6">
        <b>บัตรประจำตัวประชาชน</b>
        <form action="/api/v1/applicant/documents_upload/citizen_card" class="dropzone" id="fileCID">
            {{ csrf_field() }}
            <input type="hidden" name="upload_token" value="{{ $upload_token }}">
        </form>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-6">
        <b>ใบ ปพ.1</b> (5 ภาคเรียน ทุกหน้า)
        <form action="/api/v1/applicant/documents_upload/transcript" class="dropzone" id="fileTranscript">
            {{ csrf_field() }}
            <input type="hidden" name="upload_token" value="{{ $upload_token }}">
        </form>
    </div>
    <div class="col-md-6">
        <b>สำเนาทะเบียนบ้าน</b> ของนักเรียน (2 หน้า)
        <form action="/api/v1/applicant/documents_upload/student_hr" class="dropzone" id="fileHRApplicant">
            {{ csrf_field() }}
            <input type="hidden" name="upload_token" value="{{ $upload_token }}">
        </form>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-6">
        <b>ใบรับรองผลการเรียน</b> (<a href="https://apply.triamudom.ac.th/assets/gradecert.pdf">ดาวน์โหลด</a>)
        <form action="/api/v1/applicant/documents_upload/gradecert" class="dropzone" id="fileGradeCert">
            {{ csrf_field() }}
            <input type="hidden" name="upload_token" value="{{ $upload_token }}">
        </form>
    </div>
</div>
<br />
<span style="color:#e79528">นักเรียนต้องอัพโหลดเอกสารทั้งหมด และรอการอัพโหลดเสร็จสิ้น จึงกดบันทึกข้อมูล<br>โดยต้องส่งเอกสารให้ครบถ้วนทุกหน้า และสามารถมองเห็นรายละเอียดได้ชัดเจน</span>
<br />
<div class="row">
    <div class="col-xs-6 col-md-8">
        <span id="formAlertMessage" style="display:none;"></span>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-md-8">
        <span id="formAlertMessage" style="display:none;"></span>
    </div>
    <div class="col-xs-6 col-md-4">
        <button id="sendTheFormButton" class="btn btn-block btn-info">บันทึกข้อมูล</button>
    </div>
</div>
@endsection

@section('additional_scripts')
<script src="/assets/js/dropzone.js"></script>
<script>
Dropzone.options.filePicture = {
    maxFilesize: 5,
    maxFiles: 1,
    addRemoveLinks: true,
    dictDefaultMessage: "<small>ลากและวางไฟล์ที่นี่ หรือคลิกเพื่อเปิดกล่องเลือกไฟล์</small><small class=\"text-muted\" style=\"margin-top:-5px;display:block;\">PNG / JPG | ขนาดไฟล์สูงสุด 5 MB</small>",
    dictRemoveFile: "ลบไฟล์",
    dictFileTooBig: "ไม่สามารถอัพโหลดได้ เนื่องจากไฟล์มีขนาดใหญ่เกิน 5 MB",
    dictInvalidFileType: "ไฟล์ผิดประเภท ต้องเป็นรูปภาพ PNG หรือ JPG เท่านั้น",
    dictResponseError: "เกิดข้อผิดพลาดของเซิร์ฟเวอร์",
    dictCancelUpload: "ยกเลิกการอัพโหลด",
    dictCancelUploadConfirmation: "ยืนยันยกเลิกการอัพโหลดหรือไม่",
    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
};
Dropzone.options.fileCID = {
    maxFilesize: 5,
    maxFiles: 1,
    addRemoveLinks: true,
    dictDefaultMessage: "<small>ลากและวางไฟล์ที่นี่ หรือคลิกเพื่อเปิดกล่องเลือกไฟล์</small><small class=\"text-muted\" style=\"margin-top:-5px;display:block;\">PNG / JPG | ขนาดไฟล์สูงสุด 5 MB</small>",
    dictRemoveFile: "ลบไฟล์",
    dictFileTooBig: "ไม่สามารถอัพโหลดได้ เนื่องจากไฟล์มีขนาดใหญ่เกิน 5 MB",
    dictInvalidFileType: "ไฟล์ผิดประเภท ต้องเป็นรูปภาพ PNG หรือ JPG เท่านั้น",
    dictResponseError: "เกิดข้อผิดพลาดของเซิร์ฟเวอร์",
    dictCancelUpload: "ยกเลิกการอัพโหลด",
    dictCancelUploadConfirmation: "ยืนยันยกเลิกการอัพโหลดหรือไม่",
    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
};
Dropzone.options.fileTranscript = {
    maxFilesize: 5,
    maxFiles: 1,
    addRemoveLinks: true,
    dictDefaultMessage: "<small>ลากและวางไฟล์ที่นี่ หรือคลิกเพื่อเปิดกล่องเลือกไฟล์</small><small class=\"text-muted\" style=\"margin-top:-5px;display:block;\">PNG / JPG | ขนาดไฟล์สูงสุด 5 MB</small>",
    dictRemoveFile: "ลบไฟล์",
    dictFileTooBig: "ไม่สามารถอัพโหลดได้ เนื่องจากไฟล์มีขนาดใหญ่เกิน 5 MB",
    dictInvalidFileType: "ไฟล์ผิดประเภท ต้องเป็นรูปภาพ PNG หรือ JPG เท่านั้น",
    dictResponseError: "เกิดข้อผิดพลาดของเซิร์ฟเวอร์",
    dictCancelUpload: "ยกเลิกการอัพโหลด",
    dictCancelUploadConfirmation: "ยืนยันยกเลิกการอัพโหลดหรือไม่",
    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
};
Dropzone.options.fileHRApplicant = {
    maxFilesize: 5,
    maxFiles: 1,
    addRemoveLinks: true,
    dictDefaultMessage: "<small>ลากและวางไฟล์ที่นี่ หรือคลิกเพื่อเปิดกล่องเลือกไฟล์</small><small class=\"text-muted\" style=\"margin-top:-5px;display:block;\">PNG / JPG | ขนาดไฟล์สูงสุด 5 MB</small>",
    dictRemoveFile: "ลบไฟล์",
    dictFileTooBig: "ไม่สามารถอัพโหลดได้ เนื่องจากไฟล์มีขนาดใหญ่เกิน 5 MB",
    dictInvalidFileType: "ไฟล์ผิดประเภท ต้องเป็นรูปภาพ PNG หรือ JPG เท่านั้น",
    dictResponseError: "เกิดข้อผิดพลาดของเซิร์ฟเวอร์",
    dictCancelUpload: "ยกเลิกการอัพโหลด",
    dictCancelUploadConfirmation: "ยืนยันยกเลิกการอัพโหลดหรือไม่",
    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
};
Dropzone.options.fileGradeCert = {
    maxFilesize: 5,
    maxFiles: 1,
    addRemoveLinks: true,
    dictDefaultMessage: "<small>ลากและวางไฟล์ที่นี่ หรือคลิกเพื่อเปิดกล่องเลือกไฟล์</small><small class=\"text-muted\" style=\"margin-top:-5px;display:block;\">PNG / JPG | ขนาดไฟล์สูงสุด 5 MB</small>",
    dictRemoveFile: "ลบไฟล์",
    dictFileTooBig: "ไม่สามารถอัพโหลดได้ เนื่องจากไฟล์มีขนาดใหญ่เกิน 5 MB",
    dictInvalidFileType: "ไฟล์ผิดประเภท ต้องเป็นรูปภาพ PNG หรือ JPG เท่านั้น",
    dictResponseError: "เกิดข้อผิดพลาดของเซิร์ฟเวอร์",
    dictCancelUpload: "ยกเลิกการอัพโหลด",
    dictCancelUploadConfirmation: "ยืนยันยกเลิกการอัพโหลดหรือไม่",
    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
};
/* Form submission */
$("#sendTheFormButton").click(function(){
    // Tell the user to wait:
    $('#plsWaitModal').modal('show');
    $.ajax({
        url: '/api/v1/applicant/documents_confirm',
        data: {
            _token: csrfToken,
            upload_token: '{{ $upload_token }}'
        },
        error: function (request, status, error) {
            $('#plsWaitModal').modal('hide');
            switch(request.status){
                case 422:
                    console.log(request);
                    console.log(error);
                    notify("<i class='fa fa-exclamation-triangle text-warning'></i> มีข้อผิดพลาดของข้อมูล โปรดตรวจสอบรูปแบบข้อมูลอีกครั้ง", "warning");
                break;
                default:
                    console.log("(" + request.status + ") Exception:" + request.responseText);
                    notify("<i class='fa fa-exclamation-triangle text-warning'></i> เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาลองใหม่อีกครั้ง", "danger");
            }
        },
        dataType: 'json',
        success: function(data) {
            // Tell the user that everything went well
            $('#plsWaitModal').modal('hide');
            notify("<i class='fa fa-check'></i> บันทึกข้อมูลเรียบร้อย", "success");

            setTimeout(function(){
                 location.reload();
            }, 1500);

        },
        type: 'POST'
    });
});
</script>
@endsection
