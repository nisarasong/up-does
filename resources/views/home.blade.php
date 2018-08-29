@extends('layouts.navbar')

@section('content')
<?php
/* หน้าhome */
/* ------อินคลูดไฟล์จาก class frontend&backend มาใช้-------  */
/*
  header: เรียก style และ javascript
  menu: เรียก navbar และ footer
  media: gallery
  custom: ปรับแต่งเพิ่มเติม
  blog: เรียกบล็อก section ต่างๆ
  core: เรียก ปรับแต่งต่างๆ เช่นแปลงวันที่
  slide: เรียก slide มาใช้งาน
  db: เรียกฟังก์ชันต่างๆ
  media_manage: ค้นหาไฟล์แรกของรูป
  dialog: เรียก modal ที่แจ้งเตือน
 */
//INCLUDE File for use class and new instance;

include_once(app_path() . '/backend/Dialog.php');
//NEW Instance class for use;

$dialog = new Dialog();
?>
<div class="main-content">


  <?php
  $message = "0";
  $alid = "0";
  if (isset($_GET['mes'])) {
      $message = $_GET['mes'];
  };
  if (isset($_GET['al'])) {
      $alid = $_GET['al'];
  };
  ?>
  <?php
  if ($message != "0") {
      if ($message == "errorDB") {
          $dialog->customMessageDefault("deleteMessage", "เกิดข้อผิดพลาด", "fas fa-exclamation-triangle", "red", "จากการลบข้อมูลในฐานข้อมูล", url('home'));
      } else if ($message == "deError") {
          $dialog->customMessageDefault("deleteMessage", "เกิดข้อผิดพลาด", "fas fa-exclamation-triangle", "red", "จากการลบไฟล์ในโฮส", url('home'));
      } else if ($message == "deOK") {
          $dialog->customMessageDefault("deleteMessage", "ลบข้อมูลสำเร็จ", "fas fa-check-circle", "#66FF33", "", url('home'));
      }
  }
  ?>
</div>
    @endsection
