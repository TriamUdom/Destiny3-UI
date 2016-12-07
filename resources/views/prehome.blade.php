@extends('layouts.no_navbar')
@section('title', 'เงื่อนไขการสมัคร')

@section('content')

<!--
  ________  ______  ______
 /_  __/ / / / __ \/_  __/
  / / / / / / / / / / /
 / / / /_/ / /_/ / / /
/_/  \____/_____/ /_/

TUEnt "Destiny", (C) {{ date("Y") }} TUDT.

The world could always use more developers. Are you with us?
https://tucc.triamudom.ac.th

-->

<div class="row" style="margin-top:30px;">
    <h2>ขั้นตอนการสมัคร</h2>
    <br />
    <div class="flat-well">
        1. ศึกษาประกาศโรงเรียนเตรียมอุดมศึกษา <a href="http://www.triamudomsuksa.com/website/images/file/Scan2.pdf" target="_blank">เรื่องการรับสมัครนักเรียนประเภทโควตาจังหวัด</a><br />
        2. เตรียมไฟล์เอกสารสำหรับอัพโหลด ชนิด JPG หรือ PNG ขนาดแต่ละไฟล์ไม่เกิน 5MB ดังนี้<br />
            <ol type="1">
                <li>รูปถ่ายชุดนักเรียน ขนาด 2 นิ้ว (ถ่ายไม่เกิน 6 เดือน)</li>
                <li>บัตรประจำตัวประชาชน</li>
                <li>ใบ ปพ.1 (5 ภาคเรียน)</li>
                <li>ใบรับรองผลการเรียนเฉลี่ยรายวิชา <a href="assets/gradecert.pdf" target="_blank">(ดาวน์โหลดแบบฟอร์มเพื่อให้โรงเรียนที่กำลังศึกษารับรอง)</a></li>
                <li>สำเนาทะเบียนบ้านของนักเรียน</li>
            </ol>
        3. นักเรียนต้องกำหนดรหัสผ่านของตนเอง เพื่อตรวจสอบสถานะการสมัครในภายหลัง<br />
        <h6>4. การสมัครเสร็จสมบูรณ์เมื่อนักเรียนกด "ส่งข้อมูล"</h6><br />

        <font color="red">เมื่อโรงเรียนเตรียมอุดมศึกษาตรวจสอบข้อมูลพบว่าเป็นเท็จจะตัดสิทธิ์การสมัครสอบทุกประเภท และจะดำเนินคดีตามกฎหมาย</font>
        <br>
        <b>การตัดสินของโรงเรียนเตรียมอุดมศึกษาถือเป็นที่สิ้นสุด</b><br />
    </div>
    <br />
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <a class="btn btn-primary btn-block" href="/home">เข้าสู่ระบบการสมัคร</a>
        </div>
    </div>
</div>

@endsection
