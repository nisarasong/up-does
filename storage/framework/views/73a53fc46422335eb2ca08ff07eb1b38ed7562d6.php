<?php $__env->startSection('content'); ?>
<div class="main-content">
    <?php
    /* หน้าจัดการบุคลากร */
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
    <h2><i class="fas fa-users"></i></i>&nbsp;จัดการบุคลากร</h2>
    <hr>
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

    <?php
    $officer_cat_show = DB::table('officer_cat')->orderBy('o_sort', 'asc')->get();
    $newOrder = 0;
    if (isset($_GET['os'])) {
        $id = $_GET['os'];
        $officer_cat = DB::table('officer_cat')->orderBy('o_sort', 'asc')->where('oid', $id)->get();
        $name = $officer_cat[0]->o_name_th;
    } else {
        $name = "หมวดหมูทั้งหมด";
    }
    ?>
    <div class="table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th></th>
                    <th>ลำดับ</th>
                    <th>ชื่อหน่วยงานภาษาไทย</th>
                    <th>ชื่อหน่วยงานภาษาอังกฤษ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    <th>ดูข้อมูล</th>
                </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $officer_cat_show; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $officer_cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $tmp = $officer_cats->o_sort;
                $oid = $officer_cats->oid;
                ?>
                <tr>
            <form action="<?php echo e(url('editOfficer_cat')); ?>" method="post"  name="officer_cat<?php echo e($officer_cats->oid); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="oid" value="<?php echo e($officer_cats->oid); ?>">
                <td><input  id="oid<?php echo e($officer_cats->oid); ?>"  class="form-control"  type="hidden"   name="oids"       value="<?php echo e($officer_cats->oid); ?>" disabled></td>
                <td><input id="osort<?php echo e($officer_cats->oid); ?>"  class="form-control" type="text"   name="o_sort"      value="<?php echo e($officer_cats->o_sort); ?>" disabled></td>
                <td><input id="oname<?php echo e($officer_cats->oid); ?>" class="form-control"  type="text"   name="o_name_th"   value="<?php echo e($officer_cats->o_name_th); ?>" required disabled></td>
                <td><input id="onameen<?php echo e($officer_cats->oid); ?>" class="form-control" type="text"   name="o_name_en"   value="<?php echo e($officer_cats->o_name_en); ?>" disabled></td>
                <td>
                    <button id="osubmit<?php echo e($officer_cats->oid); ?>" type="submit" class="btn btn-success" style=" display: none;">
                        <i class="fas fa-check-circle"></i>
                    </button>
                    <button onclick="return false;"  id="close<?php echo e($officer_cats->oid); ?>" data-id="<?php echo e($officer_cats->oid); ?>" class="btn btn-warning closedbutton" style=" display: none;"><i class="fas fa-times-circle"></i></button>
                    <button onclick="return false;"  style="display: inline;" id="edit<?php echo e($officer_cats->oid); ?>"  data-id="<?php echo e($officer_cats->oid); ?>" class="btn btn-warning rbutton"><i class="fas fa-pen-square"></i></button></td>
                <td><a data-toggle="modal" data-target="#delete" data-name_th="<?php echo e($officer_cats->o_name_th); ?>"  data-id="<?php echo e($officer_cats->oid); ?>" data-name_en="<?php echo e($officer_cats->o_name_en); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
                </td>
                <td> <a class="btn btn-info" href="<?php echo url('officerPeople?oid=' . $oid); ?> ">ดูข้อมูล</a></td>
            </form>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $newOrder = $tmp + 1; ?>
            <tr id="add"  style="display: none;">
            <form action="<?php echo e(url('insertOfficer')); ?>" method="post"  name="officer_cat">
                <?php echo e(csrf_field()); ?>

                <td>เพิ่มข้อมูล</td>
                <td><input   type="text" class="form-control"   name="o_sort" value="<?php echo e($newOrder); ?>"    ></td>
                <td><input  type="text"  class="form-control"  name="o_name_th"  placeholder="ชื่อหน่วยงานภาษาไทย"  required  ></td>
                <td><input i type="text"  class="form-control"  name="o_name_en"  placeholder="ชื่อหน่วยงานภาษาอังกฤษ"   ></td>
                <td><input type="submit" class="btn btn-success" name="" value="เพิ่ม"></form></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>
                <td><button class="btn btn-success addX">เพิ่ม</button></td>
            </tr>
            </tbody>
        </table></div>
</div>

<?php
if ($message != "0") {
    if ($message == "errorDB") {
        $dialog->customMessageDefault("deleteMessage", "เกิดข้อผิดพลาด", "fas fa-exclamation-triangle", "red", "จากการลบข้อมูลในฐานข้อมูล", url('officerM'));
    } else if ($message == "deleteError") {
        $dialog->customMessageDefault("deleteMessage", "เกิดข้อผิดพลาด", "fas fa-exclamation-triangle", "red", "จากการลบไฟล์ในโฮส", url('officerM'));
    } else if ($message == "deleteOK") {
        $dialog->customMessageDefault("deleteMessage", "ลบข้อมูลสำเร็จ", "fas fa-check-circle", "#66FF33", "", url('officerM'));
    } else if ($message == "updateOK") {
        $dialog->customMessageDefault("ui", "อัพเดทข้อมูลสำเร็จ", "fas fa-check-circle", "#66FF33", "", url('officerM'));
    } else if ($message == "updateError") {
        $dialog->customMessageDefault("updateMessage", "เกิดข้อผิดพลาด", "fas fa-exclamation-triangle", "red", "จากการอัพเดทข้อมูลลงฐานข้อมูล", url('officerM'));
    } else if ($message == "OK") {
        $dialog->customMessageDefault("OK", "เพิ่มหน่วยงานสำเร็จ", "fas fa-check-circle", "#66FF33", "จากการอัพเดทข้อมูลลงฐานข้อมูล", url('officerM'));
    } else if ($message == "Error") {
        $dialog->customMessageDefault("Error", "เกิดข้อผิดพลาดในการเพิ่มหน่วยงาน", "fa-exclamation-triangle", "red", "จากการอัพเดทข้อมูลลงฐานข้อมูล", url('officerM'));
    }
}
?>

<?php /* modal ลบหน่วยงาน */ ?>
<div class="modal fade" id="delete" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center ">ต้องการลบหน่วยงาน</h2>
            </div>
            <div class="modal-body text-center ">
                <div class="text-center" style="font-size:6em; ">
                    <i style="color:crimson;" class="fas fa-trash-alt faa-shake animated"></i>
                </div>
                <div class="form-group text-left">
                    <label for="name">ชื่อหน่วยงานภาษาไทย</label>
                    <input type="text" id="name_th"  class="form-control" disabled/>
                </div>
                <div class="form-group text-left">
                    <label for="sname">ชื่อหน่วยงานภาษาอังกฤษ</label>
                    <input  type="text" class="form-control"  id="name_en"  disabled>
                </div>

                <a id="delx" style="font-size:18px;" class="btn btn-success btn-lg" ><i class="fas fa-check-circle"></i> ตกลง</a>
                <button type="button" style="font-size:18px;" class="btn btn-warning btn-lg" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                <hr>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.closedbutton').on('click', function () {
        var sent3 = $(this).data('id');

        document.getElementById("oid" + sent3).disabled = true;
        document.getElementById("osort" + sent3).disabled = true;
        document.getElementById("oname" + sent3).disabled = true;
        document.getElementById("onameen" + sent3).disabled = true;
        document.getElementById("osubmit" + sent3).style.display = "none";
        document.getElementById("close" + sent3).style.display = "none";
        document.getElementById("edit" + sent3).style.display = "inline";
    });
    $('.rbutton').on('click', function () {
        var sent3 = $(this).data('id');
        document.getElementById("oid" + sent3).disabled = true;
        document.getElementById("osort" + sent3).disabled = false;
        document.getElementById("oname" + sent3).disabled = false;
        document.getElementById("onameen" + sent3).disabled = false;
        document.getElementById("osubmit" + sent3).style.display = "inline";
        document.getElementById("close" + sent3).style.display = "inline";
        document.getElementById("edit" + sent3).style.display = "none";

    });

    $('.addX').on('click', function () {
        var x = document.getElementById("add");
        if (x.style.display === "none") {
            x.style.display = "";
        } else {
            x.style.display = "none";
        }
    });
    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var sent1 = button.data('id') // Extract info from data-* attributes
        var sent2 = button.data('name_th')
        var sent3 = button.data('name_en')
        var modal = $(this)
        var delink = "<?php echo action('OfficerController@deldeteOfficer_cat'); ?>?oid="
        var deletew = document.getElementById('delx')
        deletew.href = delink + sent1
        modal.find('.modal-body #name_en').val(sent3)
        modal.find('.modal-body #name_th').val(sent2)

    });
</script>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>