@extends('layouts.navbar')

@section('content')
<div class="main-content">
  <h2>จัดการข่าวสาร
      <div class="btn-group pull-right">
          <a href=""><button type="button" class="btn btn-primary">เพิ่มข่าวสาร</button></a>
          <a href="{{URL::to('gcontent')}}"><button type="button" class="btn btn-primary">จัดการหมวดหมู่</button></a>
      </div>
  </h2>
  <hr>
  <script>
      $(document).ready(function () {
          $('#example').DataTable({
              "order": [[3, "desc"]]

          });
      });
  </script>
  <table id="example" class="display table table-striped" cellspacing="0">
      <thead>
          <tr>
              <th>ลำดับ</th>
              <th>หัวข้อภาษาไทย</th>
              <th>หัวข้อภาษาอังกฤษ</th>
              <th>หมวดหมู่</th>
              <th>ปี</th>
              <th>ชนิด</th>
              <th>ผู้ใช้ล่าสุด</th>
              <th>แก้ไขล่าสุด</th>
              <th >แก้ไข</th>
              <th>ลบ</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $i = 1;
          foreach ($newc as $new) {
              $nid = $new->nid;
              $title_en = $new->title_en;
              $title_th = $new->title_th;
              $name_th = $new->name_th;
              $year = $new->year;
              $type = $new->type;
              $last_user = $new->last_user;
              $last_date = $new->last_date;
              ?>
              <tr>
                  <td><?php echo $i++; ?></td>
                  <td> <?php echo $title_th; ?></td>
                  <td> <?php echo $title_en; ?> </td>
                  <td><?php echo $name_th; ?> </td>
                  <td> <?php echo $year; ?> </td>
                  <td> <?php
          if ($type == 'text') {
              echo "ข้อความ";
          } elseif ($type == 'file') {
              echo "ไฟล์";
          } else {
              echo "URL";
          }
              ?> </td>
                  <td> <?php echo $last_user; ?> </td>
                  <td> <?php echo $last_date; ?> </td>
                  <td> <a href="" class="btn btn-warning">แก้ไข</a></td>
                  <td><form action="" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger" type="submit">ลบ</button>
                      </form>
                  </td>
              <?php } ?>
          </tr>
      </tbody>
  </table>
</div>
@endsection
