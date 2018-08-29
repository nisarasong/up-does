<!doctype html>
<?php
/* หน้าแสดงรูปในอัลบั้ม Gallery ขอเว็บ กบศ. */
/* ------อินคลูดไฟล์จาก class frontend&backend มาใช้-------  */
/* 
    header: เรียก style และ javascript
    menu: เรียก navbar และ footer
    media: gallery
    custom: ปรับแต่งเพิ่มเติม
    blog: เรียกบล็อก section ต่างๆ
    core: เรียก ปรับแต่งต่างๆ เช่นแปลงวันที่
*/
include_once(app_path() . '/frontend/header.php');
include_once(app_path() . '/frontend/menu.php');
include_once(app_path() . '/frontend/media.php');
include_once(app_path() . '/frontend/custom.php');
include_once(app_path() . '/frontend/blog.php');
include_once(app_path() . '/core_function/core.php');

/* NEW Instance class for use */
$header = new header();
$menu = new menu();
$media = new media();
$custom = new custom();
$blog = new blog();
$db = new databaseGet();
/* ----------------------------------------------  */
?>

<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <?php
        $header->getHead("");
        $header->getCss();
        $custom->getCustom('custom_index');
        ?>
</head>
<body>
    <?php $menu->navbar("black"); ?>
    <?php
    echo '<br><br><br>';

    /* ----------------ถ้าไม่มีการส่งไอดีเข้ามาจะกลับไปหน้า gallery--------------- */      
    $id = '';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo '<script>window.location = "' . url("gallery") . '"</script>';
        }

    /* ----------------เรียกรูปจากไฟล์-------------------- */
        $i = 0;
        $pic = array();
        try{
            $dir = public_path() . "/Gallerys/pic" . $id;
            if (isset($dir)) {
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file != "." && $file != "..") {
                            $pic[$i] = url('/public/Gallerys/pic' . $id . '/' . $file . '');
                            $i++;
                        }
                    }
                    closedir($dh);
                }
            }
        }
        catch(\Exception $t){
            echo '<script>window.location = "' . url("gallery") . '"</script>';
        }
            
        $media->gallery($pic);
        $menu->footer();
        $header->getScript();
        ?>
</body>
</html>