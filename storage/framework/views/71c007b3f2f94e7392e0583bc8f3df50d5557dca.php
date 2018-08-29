<?php $__env->startSection('content'); ?>
<div class="main-content">
    <?php
    /* หน้าจัดการอัลบั้มรูปภาพ */
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

    <?php
    $id = '';
    try {
        $message = "0";

        if (isset($_GET['mes'])) {
            $message = $_GET['mes'];
        };
        if (isset($_GET['gid'])) {
            $id = $_GET['gid'];
            File::makeDirectory(public_path() . '/Gallerys/pic' . $id, 0775, true, true);
        } else {
            $dialog->customMessageDefault("updateMessage", "เกิดข้อผิดพลาด", "fas fa-info-circle", "red", "ไม่สามารถสร้างโฟล์เดอร์อัลบั้มได้", url('galleryM'));
        }
    } catch (Exception $e) {
        $dialog->customMessageDefault("updateMessage", "เกิดข้อผิดพลาด", "fas fa-info-circle", "red", "ไม่สามารถเข้าถึงโฟล์เดอร์อัลบั้มได้", url('galleryM'));
    }

    $i = 1;
    $pic = "";
    ?>
    <div class="row">
        <div class="col-md-12">
            <h4>
                <?php
                $idAlbum = \DB::table('gallery_cat')->where('gid', $id)->get();
                foreach ($idAlbum as $ida) {
                    echo $ida->gid . " : " . $ida->g_name_th;
                }
                ?></h4>
            <a href="<?php echo url('galleryM'); ?>"  class="btn btn-primary btn-lg"><i class="fas fa-images"></i> กลับไปหน้าอัลบั้ม</a>
            <a data-toggle="modal" data-target="#addImage"  class="btn btn-success btn-lg"><i class="fas fa-plus-circle"></i> เพิ่มรูปภาพ</a>
            <hr>
        </div>
        <div class="col-md-10">
            <?php
            $dir = public_path() . "/Gallerys/pic" . $id;
            $pic = "";
            try {
                if (isset($dir)) {
                    if ($dh = opendir($dir)) {
                        while (($file = readdir($dh)) !== false) {
                            if ($file != "." && $file != "..") {
                                $pic = url('/public/Gallerys/pic' . $id . '/' . $file . '');
                                echo '<div class="col-md-4">';
                                echo '<div class="col-md-12">';
                                echo '  <img src="' . $pic . '" class="img-thumbnail zoom" alt="Cinque Terre" width="304" height="236" style="height:30vh;width:100%;"> ';
                                echo '</div>';
                                echo '<div class="col-md-12 ">';
                                echo '<a data-toggle="modal" data-target="#delimg" data-imgname="' . $file . '" data-img2="' . $pic . '" style="width:100%;" class="btn btn-danger "><i class="fas fa-trash-alt"></i> ลบ</a>';
                                echo'</div>';
                                echo '<div class="col-md-12"><br></div>';
                                echo'</div>';
                                $i++;
                            }
                        }
                        closedir($dh);
                    }
                }
                if ($i < 2) {
                    $dialog->infoMessage("tyty", "ไม่มีรูปภาพในอัลบั้ม กรุณาอัพโหลดรูปภาพ", "fas fa-images", "fas fa-info-circle", "#6495ED", "red");
                }
            } catch (exception $e) {
                $pic = url("/Gallerys/img/nullimage.jpg");
                $dialog->customMessageDefault("updateMessage", "เกิดข้อผิดพลาด", "fas fa-info-circle", "red", "ไม่สามารถเข้าถึงโฟล์เดอร์อัลบั้มได้", url('galleryM'));
            }
            ?>
        </div>
    </div>

    <?php /* modal เพิ่มรูปภาพ */ ?>
    <div class="modal fade" id="addImage" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2><i class="fas fa-image"></i> เพิ่มรูปภาพ</h2>
                </div>
                <div class="modal-body text-center ">
                    <form action="<?php echo e(action('Controller@upload_gal')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input type="hidden" name="gid" value="<?php echo e($id); ?>"  />
                            <input type="hidden" name="path"  value="<?php echo e('/Gallerys/pic'.$id); ?>"  />
                            <input accept="image/*" id="fileupload" class="btn btn-default" id="file"accept=".gif,.jpg,.png,.svg"  type="file" name="photos[]" multiple required/>
                        </div>
                        <div id="dvPreview">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-lg"  ><i class="fas fa-upload"></i> อัพโหลดภาพ</button>
                        <button type="button" style="font-size:18px;" class="btn btn-warning btn-lg" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php /* modal ลบรูปภาพ */ ?>
    <div class="modal fade" id="delimg" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center ">ต้องการลบรูปภาพ</h2>
                </div>
                <div class="modal-body text-center ">
                    <div class="text-center" style="font-size:6em; ">
                        <img id="img2" class="zoom" style="height:90px; width:190px; border-radius: 10px; " />
                        <i style="color:darkgray;" class="fas fa-arrow-right "></i>
                        <i style="color:crimson;" class="fas fa-trash-alt faa-shake animated"></i>
                    </div><br>
                    <a id="delx" style="font-size:18px;" href=" "class="btn btn-success btn-lg" ><i class="fas fa-check-circle"></i> ตกลง</a>
                    <button type="button" style="font-size:18px;" class="btn btn-warning btn-lg" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($message != "0") {
        if ($message == "UploadOk") {
            $dialog->customMessageDefault("updateMessage", "อัพโหลดรูปสำเร็จ", "fas fa-check-circle", "#66FF33", "", url('galleryAdd?gid=' . $id));
        } else if ($message == "UploadError") {
            $dialog->customMessageDefault("UploadError", "เกิดข้อผิดพลาดในการอัพโหลดรูป", "fas fa-exclamation-triangle", "red", "ขั้นตอนการอัพโหลดหรือการแปลงขนาดรูปภาพอาจมีปัญหา", url('galleryAdd?gid=' . $id));
        } else if ($message == "DelImgError") {
            $dialog->customMessageDefault("DeleteError", "เกิดข้อผิดพลาดในการลบรูป", "fas fa-exclamation-triangle", "red", "ที่อยู่ไฟล์รูปอาจมีปัญหา", url('galleryAdd?gid=' . $id));
        } else if ($message == "DelImgOk") {
            $dialog->customMessageDefault("DeleteSuccess", "ลบรูปสำเร็จ", "fas fa-check-circle", "#66FF33", "", url('galleryAdd?gid=' . $id));
        }
    }
    ?>

    <script language="javascript" type="text/javascript">

        $('#delimg').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var sent1 = button.data('name') // Extract info from data-* attributes
            var sent2 = button.data('imgname')
            var sent3 = button.data('img2')
            var modal = $(this)
            var delink = "<?php echo action('Controller@img_del'); ?>?gid=<?php echo $id; ?>&path="
            var scr = document.getElementById('img2')
            var deletew = document.getElementById('delx')
            scr.src = sent3
            deletew.href = delink + sent2
            modal.find('.modal-body #g_name_th').val(sent1)
            modal.find('.modal-body #gid').val(sent2)
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
                        2399012
                        if (file.size > 2399012) {
                            alert(file.name + "ต้องเป็นไฟล์ ต้องมีขนาดไม่เกิน 2 MB");

                            dvPreview.innerHTML = "";
                            $("#fileupload").val('');
                            return false;
                        }
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "100";
                                img.width = "100";
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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>