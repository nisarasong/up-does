<?php $__env->startSection('content'); ?>
<div class="main-content">
    <?php
    /* หน้าแก้ไขข่าวสาร */
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

    <h2>แก้ไขข่าวสาร
    </h2>
    <hr>

    <form method="post" action="<?php echo e(url('ucontent')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <?php
        foreach ($newsshow as $new) { {
                $newc = DB::table('news_cat')->orderBy('type_news_cat','desc')->get();
                ?>
                <div class="form-group">
                    <label for="group">หมวดหมู่ : <?php echo $new->name_th; ?></label>
                    <select class="form-control" id="group" name="group">
                        <option value="<?php echo $new->cat; ?>">แก้ไขหมวดหมู่</option>
                        <?php
                        $a = 0;
                        $b = 0;
                        $c = 0;
                        $d = 0;
                        $e = 0;
                        foreach ($newc as $name) {
                            if ($name->type_news_cat == "1" && $a == 0) {
                                echo '<optgroup label="แสดงที่หน้าข่าวประกาศ">';
                                $a++;
                            } else if ($name->type_news_cat == "2" && $b == 0) {
                                echo '<optgroup label="แสดงที่หน้านิสิตปริญญาตรี">';
                                $b++;
                            } else if ($name->type_news_cat == "3" && $c == 0) {
                                echo '<optgroup label="แสดงที่หน้าบัณฑิตศึกษา">';
                                $c++;
                            } else if ($name->type_news_cat == "4" && $d == 0) {
                                echo '<optgroup label="แสดงที่หน้าคณาจารย์/เจ้าหน้าที่">';
                                $d++;
                            } else if ($name->type_news_cat != "1" && $name->type_news_cat != "2" && $name->type_news_cat != "3" && $name->type_news_cat != "4" && $e == 0) {
                                echo '<optgroup label="อื่นๆ">';
                                $e++;
                            }
                            echo '<option value="' . $name->id . '">' . $name->name_th . '</option>';
                        }
                    }

                ?>
            </select>
        </div>
        <input type="hidden" name="nid" value="<?php echo $new->nid; ?>">
        <input type="hidden" name="create_user" value="<?php echo e(Auth::user()->username); ?>">
        <input type="hidden" name="create_date" value="<?php
        date_default_timezone_set("Asia/Bangkok");
        echo date("Y-m-d H:i:s");
        ?>">
        <div class="form-group">
            <label for="order">ลำดับ:</label>
            <input type="number" class="form-control" id="order" name="order" value="<?php echo e($new->orders); ?>">
        </div>
        <div class="form-group">
            <label for="title_th">หัวข้อภาษาไทย:</label>
            <input type="text" class="form-control" id="title_th" name="title_th" value="<?php echo e($new->title_th); ?>">
        </div>
        <div class="form-group">
            <label for="title_en">หัวข้อภาษาอังกฤษ:</label>
            <input type="text" class="form-control" id="title_en" name="title_en" value="<?php echo e($new->title_en); ?>">
        </div>
        <div class="form-group">
            <label for="title_en">อัพโหลดรูปภาพ: <?php echo e($new->img); ?></label><br>
            <?php
            $img = url("/assets/images/Picture2.png");
            if ($new->img != null) {
                $img = asset("public/uploadimg" . '/' . $new->img);
            }
            ?>
            <img src="<?php echo e($img); ?>" style="width:100px;height:100px;">
            <input class="btn btn-default" type="file" name="img" value="<?php echo e($new->img); ?>">
            <input class="btn btn-default" type="hidden" name="img" value="<?php echo e($new->img); ?>">
        </div>
        <div class="form-group">
            <label for="type">ประเภทข่าว:</label>
            <select class="form-control" id="sel" name="type" value="<?php echo e($new->type); ?>">
                <option selected="selected" value="file">FILE</option>
                <option value="url">URL</option>
                <option value="text">ข้อความ</option>
            </select>
        </div>

        <div class="panel-group type_t" id="accordion">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">ข้อความภาษาไทย
                            <i class="fas fa-minus pull-right"></i></a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <textarea id="editor1" name="text_th" rows="10" cols="80">
          <?php echo e($new->text_th); ?>

                        </textarea>
                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">ข้อความภาษาอังกฤษ
                            <i class="fas fa-minus pull-right"></i></a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <textarea id="editor2" name="text_en" rows="10" cols="80" >
          <?php echo e($new->text_en); ?>

                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group type_u">
            <label>URL</label>
            <input name="url" type="text" class="form-control" placeholder="Enter ..." value="<?php echo e($new->url); ?>">
        </div>
        <div class="form-group type_f">
            <label>File: <?php echo e($new->file); ?></label>
            <input type="hidden" name="file" value="<?php echo $new->file;?>">
            <input  class="btn btn-default" type="file" name="file">
        </div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">บันทึก</button>
        </div>
</div>

</form>

</div>
 <?php } ?>
<script src="<?php echo e(asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
<script>
CKEDITOR.replace('editor1');
CKEDITOR.replace('editor2');
$(".textarea").wysihtml5();
</script>
<script type="text/javascript">

    $("select ")
            .change(function () {
                var str = "";
                $("#sel  option:selected").each(function () {
                    str = $(this).text();
                });
                //$( "div #sweet" ).text( str );

                if (str == "ข้อความ") {
                    $('.type_t').show();
                    $('.type_f').hide();
                    $('.type_u').hide();
                } else if (str == "FILE") {
                    $('.type_t').hide();
                    $('.type_f').show();
                    $('.type_u').hide();
                } else if (str == "URL") {
                    $('.type_t').hide();
                    $('.type_f').hide();
                    $('.type_u').show();
                }
                delete str;
            })
            .change();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>