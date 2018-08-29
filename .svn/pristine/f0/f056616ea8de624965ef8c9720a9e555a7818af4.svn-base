@extends('layouts.navbar')

@section('content')
<div class="main-content">
    <?php
    /* หน้าจัดการการแก้ไขบุคลากร */
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
    include_once(app_path() . '/frontend/header.php');
    include_once(app_path() . '/frontend/menu.php');
    include_once(app_path() . '/frontend/media.php');
    include_once(app_path() . '/frontend/custom.php');
    include_once(app_path() . '/frontend/blog.php');
    include_once(app_path() . '/core_function/core.php');
    include_once(app_path() . '/backend/MediaManager.php');
    include_once(app_path() . '/backend/Dialog.php');
    //NEW Instance class for use;
    $header = new header();
    $menu = new menu();
    $media = new media();
    $custom = new custom();
    $blog = new blog();
    $db = new databaseGet();
    $media_manage = new MediaManager();
    $dialog = new Dialog();
    ?>
    <?php
    $message = "0";
    $alid = "0";
    if (isset($_GET['mes'])) {
        $message = $_GET['mes'];
    };
    if (isset($_GET['oid'])) {
        $alid = $_GET['oid'];
    };
    ?>

    <h2><i class="fas fa-users"></i></i>&nbsp;จัดการบุคลากร
        <div class="btn-group pull-right">
            <a data-toggle="modal" data-target="#addContent"  class="btn btn-primary"><i class="fas fa-plus-square"></i> เพิ่มบุคลากร</a>
        </div>
    </h2>

    <hr>
    <form action="{{url('/officerPeople?oid='.$alid)}}" method="get">
        <div class="input-group">
            <input type="hidden" name="oid" class="form-control" value="{{$alid}}">
            <input type="text" name="keyword" class="form-control" placeholder="ค้นหาจาก ชื่อบุคลากร">
            <div class="input-group-btn">
                <input type="submit" value="ค้นหา" class="form-control" >
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table id="example" class="display table table-striped" cellspacing="0" style="font-size:16px; ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รูป</th>
                    <th>@sortablelink('sort','ลำดับ')</th>
                    <th>@sortablelink('name','ชื่อ - นามสกุล')</th>
                    <th>@sortablelink('growth','ตำแหน่ง')</th>
                    <th>@sortablelink('tel','เบอร์โทร')</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if (isset($_GET['page'])) {
                    if ($_GET['page'] > 1) {

                        $i = (10 * $_GET['page']) - 9;
                    }
                }
                foreach ($peoples as $people) {
                    echo '<tr>
                    <td>' . $i++ . '</td>
                    <td><img class="zoom" style="height:150px; width:130px; border: 3px solid #3cc3d8;   " src="' . $db->img($people->image, $people->oid) . '"/></td>
                    <td>' . $people->sort . '</td>
                    <td>' . $people->name . " " . $people->sname . '</td>
                    <td>' . $people->growth . '</td>
                    <td>' . tel($people->tel) . '</td>
                    <td><a data-toggle="modal" data-target="#edContent" data-tel="' . $people->tel . '" data-gr="' . $people->growth . '" data-id="' . $people->id . '"data-img="' . $db->img($people->image, $people->oid) . '" data-name="' . $people->name . '" data-sname="' . $people->sname . '" data-sort="' . $people->sort . '" class="btn btn-warning"><i class="far fa-edit"></i> แก้ไข</a></td>
                    <td><a data-toggle="modal" data-target="#delete" data-name="' . $people->name . ' " data-sname="' . $people->sname . '"  data-id="' . $people->id . '" data-oid="' . $alid . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
                         </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table></div>
    {!! $peoples->appends(\Request::except('page'))->render() !!}
</div>
</div>
</div>

<?php /* modal เพิ่มบุคลากร */ ?>
<div class="modal fade" id="addContent" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เพิ่มบุคลากร</h4>
            </div>
            <div class="modal-body">
                <form action="{{ action('OfficerController@insertPeople')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="dvPreview">
                    </div>
                    <div class="form-group">
                        <label for="image">อัพโหลดรูปภาพ:</label>
                        <input id="image" class="btn btn-default" id="file" accept=".gif,.jpg,.png,.svg"  type="file" name="image"  required/>
                    </div>
                    <div class="form-group">
                        <label for="gid">ลำดับ: </label>
                        <input id="oid" name="oid" type="hidden" value="{{ $alid }}">
                        <input type="text" placeholder="ลำดับ" id="sort" name="sort" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="name">ชื่อ: </label>
                        <input class="form-control" placeholder="ชื่อ" required id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="sname">นามสกุล: </label>
                        <input class="form-control" placeholder="นามสกุล" required id="sname" name="sname">
                    </div>
                    <div class="form-group">
                        <label for="tel">เบอร์โทรศัพท์: </label>
                        <input class="form-control" placeholder="เบอร์โทรศัพท์" required id="tel" name="tel">
                    </div>
                    <div class="form-group">
                        <label for="growth">ตำแหน่ง: </label>
                        <input class="form-control" placeholder="ตำแหน่ง" required id="growth" name="growth">
                    </div>
                    <div class="form-group">
                        <label for="last_date">เวลาแก้ไขล่าสุด : {{date("Y-m-d h:m:s")}}</label>
                        <input type="hidden"  value="{{date("Y-m-d h:m:s")}} " id="last_date" name="last_date"   />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="submit" value="Update"  class="btn btn-primary">บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php /* modal แก้ไขบุคลากร */ ?>
<div class="modal fade" id="edContent" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">แก้ไขบุคลากร</h4>
            </div>
            <div class="modal-body">
                <form action="{{ action('OfficerController@editOfficer')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class='form-group '>
                        <center><img id="img" class="zoom" style="height:150px; width:130px; border-radius: 10px; " /></td></center>
                    </div>
                    <input id="image" class="btn btn-default" id="file" accept=".gif,.jpg,.png,.svg"  type="file" name="image"  />
                    <label for="g_name">ที่อยู่รูป: </label>
                    <input type="text" id="img" name="link" class="form-control" />
                    <input type="hidden" id="img" name="img" class="form-control" />
                    <div class="form-group">
                        <label for="gid">ลำดับ: </label>
                        <input value="{{$alid}}" name="oid" type="hidden">
                        <input id="id" name="id" type="hidden">
                        <input type="text" id="sort" name="sort" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="g_name">ชื่อ: </label>
                        <input class="form-control" required id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="g_name">นามสกุล: </label>
                        <input class="form-control" required id="sname" name="sname">
                    </div>
                    <div class="form-group">
                        <label for="tel">เบอร์โทรศัพท์: </label>
                        <input type="text" class="form-control" required id="tel" name="tel">
                    </div>
                    <div class="form-group">
                        <label for="growth">ตำแหน่ง: </label>
                        <input type="text"  class="form-control" required id="growth" name="growth">
                    </div>
                    <div class="form-group">
                        <label for="last_user">แก้ไขโดย : {{ Auth::user()->username }}</label>
                        <input type="hidden"  value="{{ Auth::user()->username }}" id="last_user" name="last_user"   />
                    </div>
                    <div class="form-group">
                        <label for="last_date">เวลาแก้ไขล่าสุด : {{date("Y-m-d h:m:s")}}</label>
                        <input type="hidden"  value="{{date("Y-m-d h:m:s")}} " id="last_date" name="last_date"   />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="submit" value="Update"  class="btn btn-primary">บันทึก</button>
            </div>
            </form>
        </div>

    </div>
</div>

<?php /* modal ลบบุคลากร */ ?>
<div class="modal fade" id="delete" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center ">ต้องการลบบุคลากร</h2>
            </div>
            <div class="modal-body text-center ">
                <div class="text-center" style="font-size:6em; ">
                    <i style="color:crimson;" class="fas fa-trash-alt faa-shake animated"></i>
                </div>
                <div class="form-group text-left">
                    <label for="sname">ชื่อ</label>
                    <input  type="text" class="form-control"  id="name"  disabled>
                </div>

                <a id="delx" style="font-size:18px;" class="btn btn-success btn-lg" ><i class="fas fa-check-circle"></i> ตกลง</a>
                <button type="button" style="font-size:18px;" class="btn btn-warning btn-lg" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                <hr>
            </div>
        </div>
    </div>
</div>
<?php

function tel($tel) {
    if ($tel != "") {
        return $tel;
    } else {
        return "-";
    }
}

if ($message != "0") {
    $oid = $_GET['oid'];
    if ($message == "errorDB") {
        $dialog->customMessageDefault("deleteMessage", "เกิดข้อผิดพลาด", "fas fa-exclamation-triangle", "red", "จากการลบข้อมูลในฐานข้อมูล", url('officerPeople?oid=' . $oid));
    } else if ($message == "deError") {
        $dialog->customMessageDefault("deleteMessage", "เกิดข้อผิดพลาด", "fas fa-exclamation-triangle", "red", "จากการลบไฟล์ในโฮส", url('officerPeople?oid=' . $oid));
    } else if ($message == "deOK") {
        $dialog->customMessageDefault("deleteMessage", "ลบข้อมูลสำเร็จ", "fas fa-check-circle", "#66FF33", "", url('officerPeople?oid=' . $oid));
    } else if ($message == "OK") {
        $dialog->customMessageDefault("ui", "อัพเดทข้อมูลสำเร็จ", "fas fa-check-circle", "#66FF33", "", url('officerPeople?oid=' . $oid));
    } else if ($message == "Error") {
        $dialog->customMessageDefault("updateMessage", "เกิดข้อผิดพลาด", "fas fa-exclamation-triangle", "red", "จากการอัพเดทข้อมูลลงฐานข้อมูล", url('officerPeople?oid=' . $oid));
    } else if ($message == "inOK") {
        $dialog->customMessageDefault("createMessage", "เพิ่มบุคลากรสำเร็จ", "fas fa-check-circle", "#66FF33", "จากการอัพเดทข้อมูลลงฐานข้อมูล", url('officerPeople?oid=' . $oid));
    } else if ($message == "inError") {
        $dialog->customMessageDefault("createMessage", "เกิดข้อผิดพลาดในการเพิ่มบุคลากร", "fa-exclamation-triangle", "red", "จากการอัพเดทข้อมูลลงฐานข้อมูล", url('officerPeople?oid=' . $oid));
    }
}
?>
<script>
    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var sent1 = button.data('id') // Extract info from data-* attributes
        var sent2 = button.data('oid')
        var sent3 = button.data('name')
        var sent4 = button.data('sname')
        var modal = $(this)
        var delink = "<?php echo action('OfficerController@deleteOfficer'); ?>?oid=<?php echo $alid; ?>&id="
        var deletew = document.getElementById('delx')
        deletew.href = delink + sent1
        var name = sent3 + sent4
        modal.find('.modal-body #name').val(name)


    })

    $('#edContent').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var sent1 = button.data('name') // Extract info from data-* attributes
        var sent2 = button.data('id')
        var sent3 = button.data('img')
        var sent4 = button.data('sname')
        var sent5 = button.data('tel')
        var sent6 = button.data('gr')
        var sent7 = button.data('sort')
        var modal = $(this)
        var scr = document.getElementById('img');
        scr.src = sent3;
        modal.find('.modal-body #name').val(sent1)
        modal.find('.modal-body #sname').val(sent4)
        modal.find('.modal-body #img').val(sent3)
        modal.find('.modal-body #id').val(sent2)
        modal.find('.modal-body #tel').val(sent5)
        modal.find('.modal-body #growth').val(sent6)
        modal.find('.modal-body #sort').val(sent7)
    })
    window.onload = function () {
        var fileUpload = document.getElementById("fileupload");
        fileUpload.onchange = function () {
            if (typeof (FileReader) != "undefined") {
                var dvPreview = document.getElementById("dvPreview");
                dvPreview.innerHTML = "";
                var regex = /^([%()a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;

                for (var i = 0; i < fileUpload.files.length; i++) {
                    var file = fileUpload.files[i];
                    if (regex.test(file.name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = document.createElement("IMG");
                            img.height = "150";
                            img.width = "150";
                            img.className = "zoom";
                            img.src = e.target.result;
                            dvPreview.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    } else {
                        alert(file.name + "ต้องเป็นไฟล์ .png .jpg .bmp .gif เท่านั้น");
                        dvPreview.innerHTML = "";
                        $("#fileupload").val('');
                        return false;
                    }
                }
            } else {
                alert("บราวเซอร์ของคุณไม่รองรับการใช้งาน");
            }
        }
    };
</script>
@endsection
