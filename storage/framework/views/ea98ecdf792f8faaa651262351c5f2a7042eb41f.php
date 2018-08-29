<!doctype html>
<?php
/* หน้าโครงสร้างหน่วยงาน และคำขวัญ ขอเว็บ กบศ. */
/* ------อินคลูดไฟล์จาก class frontend&backend มาใช้-------  */
/* 
    header: เรียก style และ javascript
    menu: เรียก navbar และ footer
    media: gallery
    custom: ปรับแต่งเพิ่มเติม
    blog: เรียกบล็อก section ต่างๆ
*/
include_once(app_path() . '/frontend/header.php');
include_once(app_path() . '/frontend/menu.php');
include_once(app_path() . '/frontend/media.php');
include_once(app_path() . '/frontend/custom.php');
include_once(app_path() . '/frontend/blog.php');

/* NEW Instance class for use */
$header = new header();
$menu = new menu();
$media = new media();
$custom = new custom();
$blog = new blog();
/* ----------------------------------------------  */
?>

<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
  <?php
       $header->getHead("");
       $header->getCss();
       $custom->getCustom('custom_index');
      ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

  <?php $menu->navbar("black"); ?>
  <?php $blog->blogOnC("cid-qHIXZx80S12   mbr-parallax-background", "header2-b", "0", "18,18,18"); ?>
  <div class="container align-center">
    <div class="row justify-content-md-center">
      <div class="mbr-white col-md-10"><br><br><br><br>
        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-2"><?php echo e(__("structure")); ?></h1>
      </div>
    </div>
  </div>
  <?php $blog->blogOffC(); ?>


  <?php $blog->blogOnC("tabs2 cid-qHJ9gv4gsu", "tabs2-r", "0", "0,0,0"); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs" role="tablist">
          <?php
                           try{ $officerX = DB::table('officer_cat')->where('o_sort',1)->get();
                            $num =$officerX[0]->oid;}catch(\Exception $e){
                              $num = 3;
                            }
                           if(isset($_GET['tid'])){
                               $num = $_GET['tid'];
                               /* ---สำหรับคลิกแล้วให้ สกรอมาที่เมนู--- */
                               echo '   <script type="text/javascript">
                                      $(window).on("load",function(){
                                        $("html, body").animate({
                                        scrollTop: $("#tabs2-r_tab0").offset().top
                                      }, 1000)
                                      });
                                  </script>';
                                /* ---------------------------- */
                           }

                        $officer = DB::table('officer_cat')->orderby('o_sort')->get();
                        foreach($officer as $officers)
                        {
                           tabsPanels($officers->o_name_th,$officers->oid,$num);
                        }
          ?>
        </ul>
      </div>

      <div class="col-md-12">
        <div class="tab-content">
          <?php
                $blog->tabsPaneOn("tab1", "in active");
                $officer_people = DB::table('officer')->where('oid', $num)->orderBy('sort', 'asc')->orderBy('oid', 'asc')->get();
          ?>
            <div class="container" style="text-align:center!important; border-radius: 20px; box-shadow:0 3px 36px 0 rgba(0, 0, 0, 0.6); background-color:white; 	border: 5px solid #ffffff;">
              <br>
              <div class="row">
                <?php
                               foreach ($officer_people as $fp) {
                                  echo '<div class="col-md-3">
                                        <div class="thumbnail">
                                          <a href="'.checkImage($fp->image,$fp->oid).'">
                                            <img src="'.checkImage($fp->image,$fp->oid).'" style="height:167px;">
                                            <div class="caption"><br>
                                              <h2 class="mbr-fonts-style display-7 " style="font-size:18px!important;"><b>'.$fp->name." ". $fp->sname.'<b></h2><hr>
                                              <h3 class="mbr-fonts-style display-7 ">'.$fp->growth.'</h3>
                                              <h4 class="mbr-fonts-style display-7 " style="font-size:12px!important;">เบอร์โทร :'.$fp->tel.'</h4>
                                              <br><br>
                                            </div>
                                          </a>
                                        </div>
                                      </div>';
                               }
                               ?> 
                </div>
              <?php $blog->tabsPaneOff(); ?>
            </div>
        </div>
      </div>
    </div>
    <?php $blog->blogOffC(); ?>

    <?php
   $menu->footer();
   $header->getScript();
   ?>
</body>
</html>


<?php
/* ----------------ฟังก์ชันปุ่มเมนู---------------- */
   function tabsPanels($h1, $tabid,$num) {
       $active = '';
    if($tabid == $num){$active = "active";}
       echo '<li class="" ><a class="nav-link mbr-fonts-style display-7 '.$active.'" style=""  href="'.url('about_people').'?tid='.$tabid.'" >
       ' . $h1 . '</a></li>';
   }

/* ----------------ฟังก์ชันก์รูปดูว่าเป็นลิ้งหรือเป็นไฟล์---------------- */
   function checkImage($x,$id){
     $out = explode('(ld)',$x);
     if(count($out)!=1){return $out[1]; }
     else {return url('/public/user').'/cat'.$id.'/'.$out[0];}
   }
   ?>