@extends('layouts.no_navbar')
@section('title', 'หน้าหลัก')

@section('content')

<!--

.----------------.  .----------------.
| .--------------. || .--------------. |
| |  _________   | || | _____  _____ | |
| | |  _   _  |  | || ||_   _||_   _|| |
| | |_/ | | \_|  | || |  | |    | |  | |
| |     | |      | || |  | '    ' |  | |
| |    _| |_     | || |   \ `--' /   | |
| |   |_____|    | || |    `.__.'    | |
| |              | || |              | |
| '--------------' || '--------------' |
'----------------'  '----------------'
.----------------.  .----------------.
| .--------------. || .--------------. |
| |     ______   | || |     ______   | |
| |   .' ___  |  | || |   .' ___  |  | |
| |  / .'   \_|  | || |  / .'   \_|  | |
| |  | |         | || |  | |         | |
| |  \ `.___.'\  | || |  \ `.___.'\  | |
| |   `._____.'  | || |   `._____.'  | |
| |              | || |              | |
| '--------------' || '--------------' |
'----------------'  '----------------'

The world could always use more heroes. Join us!
http://tucc.triamudom.ac.th

(HTTP Link, we know. We're working on it!)

-->

<div class="row" style="margin-top:30px;">
    <div class="col-md-12">
        <h1>ระบบรับสมัครนักเรียน<br />โรงเรียนเตรียมอุดมศึกษา</h1>
        <h4>// เกี่ยวกับโปรแกรม</h4>
    </div>
</div>

<div class="row" style="margin-top:18px;">
    <div class="col-md-12">
        <div class="login-form">
            <h5 style="margin:0px;font-weight:normal;">TUEnt "Destiny" <b>3.0.1</b></h5>
        </div>
        <br />
        <div class="login-form">
            <!-- start team -->
            <h5>ครูที่ปรึกษาโครงการ</h5>
            <div class="row">
              <div class="col-sm-3">
                ครูพัชรา คงแก้ว
              </div>
            </div>
            <hr>
            <h5>ทีมงานพัฒนาโปรแกรม</h5>
            <div class="row">
              <div class="col-sm-3">จักรพงศ์ นาคเดช</div>
              <div class="col-sm-3">ศรัณญ์ อินทรลาวัณย์</div>
              <div class="col-sm-3">พสิษฐ์ อัศวิษณุ</div>
              <div class="col-sm-3">ปพน ชัยศรีสุขอำพร</div>
            </div>
            <div class="row">
              <div class="col-sm-3">ศิวัช เตชวรนันท์</div>
              <div class="col-sm-3">ปรรพากร ศิริพาณิช</div>
              <div class="col-sm-3">พัสกร ชุญยราศรี</div>
            </div>
            <hr>
            <h5>ฝ่ายศิลป์</h5>
            <div class="row">
              <div class="col-sm-3">อนัญญา จันทรพันธุ์</div>
              <div class="col-sm-3">แพรว ศิริอุดมเศรษฐ</div>
              <div class="col-sm-3">สุภัสสร หทัยเดชะดุษฎี</div>
              <div class="col-sm-3">เอื้อมบุญ ศรีดี</div>
            </div>
            <!-- end team -->
        </div>
    </div>
    <br />
</div>

<div class="row" style="margin-top:15px;">
    <div class="col-md-12">
        <a href="/" class="btn btn-lg btn-block btn-primary">กลับหน้าหลัก</a>
    </div>
</div>

@endsection