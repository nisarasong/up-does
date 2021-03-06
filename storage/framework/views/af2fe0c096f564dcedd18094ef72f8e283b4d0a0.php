<!doctype html>
<?php
/* หน้า Gallery ขอเว็บ กบศ. */
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
<style></style>
<body>
  <?php $menu->navbar("black"); ?>
  <?php
            $blog->blogOnC("tabs2 cid-qHJ9gv4gsu","tabs2-r","0","0,0,0");
           $gallery = DB::table('gallery_cat')->orderBy('create_date', 'desc')->paginate(10);
           ?>
    <?php /* Style สำหรับปรับแต่ง เลขหน้า(1,2,3,...)ในการ Query ข้อมูล */ ?>
    <style>
      .pagination {
        padding: 30px 0;
      }
      .pagination ul {
        padding: 0;
        background-color: white;
        list-style-type: none;
        margin: auto;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
      }
      .pagination li {
        display: inline-block;
        padding: 10px 18px;
        color: #222;
      }
      .pagination li.active {
        display: inline-block;
        padding: 10px 18px;
        background-color: #42bcf4;
        color: white;
      }
      .pagination li.hover {
        background-color: #b1e3f9;
      }
    </style>

    <br><br>
    <?php
           $blog->divOn("timeline","margin-left:10%;");
           $blog->ul('');
           foreach ($gallery as $gallerys) {
             try{
              timeLine('',$gallerys->g_name_th,$db->convertDateNoTime($gallerys->create_date),url("galleryView").'?id='.$gallerys->gid,"text-align:left; font-size:12px!important;", getimg($gallerys->gid));
             }
             catch(exception $e){continue;}
               }
               $blog->eul('');

              $blog->blogOffC();
     ?>

     <?php /* --------แสดงเลขหน้าในการ query-------- */ ?>
      <div class="container-fluid" style="background-color:white;">
        <div class="pagination center-block"><?php echo str_replace('/?', '?', $gallery->render()); ?></div>
      </div>

      <?php
           $menu->footer();
           $header->getScript();
           
/* ----------------ฟังก์ชันเรียกรูปจากไฟล์--------------- */
           function getfile($id){
             try{
               $dir = "/Gallerys/pic".$id;
               $pic="";
               $i=0;
               if (isset($dir)){
                 if ($dh = opendir($dir)){
                   while (($file = readdir($dh)) !== false){
                 if($file != "." && $file != ".."){
                     $pic = url('/Gallerys/pic'.$id.'/'.$file.'');
                     $i++;
                      if($i>1)break;
                   }
                     if($i==1)break;
                   }
                   closedir($dh);
                 }
               }
               return $pic;
             }catch(exception $e){ echo '<script>window.location = "'.url("gallery").'"</script>'; }
           }

/* ----------------ฟังก์ชันเรียกทามไลน์รูปภาพ--------------- */
           function timeLine($title,$main,$date,$link,$style,$img){
               echo '<li >
                <h3 class="display-7" style="'.$style.'">'.$title.' <time class="display-7">'.$date.'</time></h3><hr>
               <img style="  height:150px; width:250px; border-radius: 10px; "   src="'.$img.'" alt="">
               <br><br><p class="display-7">'.$main.'</p>
               <hr>
               <a href="'.$link.'" class="display-7">'.__("viewpic").'</a>
             </li>';
           }

/* ----------------ฟังก์ชันเรียกรุปแรกในอัลบั้มมาแสดง--------------- */
           function getimg($id){
            $dir =  public_path() . "\Gallerys\pic" . $id;
            $pic = "";
            if (isset($dir)) {
              if ($dh = opendir($dir)) {
                  while (($file = readdir($dh)) !== false) {
                      if ($file != "." && $file != "..") {
                          $pic = url('/public/Gallerys/pic' . $id . '/' . $file . '');
                          break;
                          $i++;
                      }
                  }
                  closedir($dh);
              }}
            return $pic;
          }
        ?>
</body>
</html>
