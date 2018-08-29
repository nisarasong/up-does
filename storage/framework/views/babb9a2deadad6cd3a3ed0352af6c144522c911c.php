<!doctype html>
<?php
/* หน้าข่าว ขอเว็บ กบศ. */
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


<?php
/* ----------- SET ENVIRONMENT ----------- */
$locale = App::getLocale();
$newsCat_type = 2;
$tabMenu = DB::table('news_cat')->where('type_news_cat', $newsCat_type)->orderby('order', 'asc')->orderby('last_date', 'DESC')->get();
$tabActiveId = (isset($_GET['tnewsid']))?$_GET['tnewsid']:$tabMenu[0]->id;
$viewId = (isset($_GET['viewId']))?$_GET['viewId']:$tabMenu[0]->view;
$count= ($viewId == 1)?$count=10:$count=30;
$dataQuery =   $news1 = DB::table('news')->where('cat', $tabActiveId)->orderBy('last_date_new', 'DESC')->orderBy('orders', 'asc')->paginate($count);

?>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <?php
        $header->getHead("");
        $header->getCss();
        $custom->getCustom('custom_index');
        $custom->getCustom('pagenumber');
        ?>
    </head>
<body>
  <br><br>
          <?php $menu->navbar("black");
          $blog->blogOnC("tabs2 cid-qHJ9gv4gsu", "tabs2-r", "0", "0,0,0");
          $custom->createTabMenu($tabMenu,$tabActiveId,$locale,1,'student');
          $blog->tabsPaneOn("tab1", "in active");
          echo '<div class="container" style="text-align:left!important; border-radius: 20px; box-shadow:0 3px 36px 0 rgba(0, 0, 0, 0.6); background-color:white; 	border: 5px solid #ffffff;"><br>';
          $viewShowData = ($viewId == 1)?$custom->getViewDefault($dataQuery,1024,1):$custom->getViewList($dataQuery,1024,$viewId);
          ?><div class="pagination center-block"><?php echo str_replace('/?', '?',$dataQuery->render()); ?></div><?php
          echo '</div>';
          $blog->tabsPaneOff();
          ?>

          <?php
          $blog->blogOffC();
          $menu->footer();
          $header->getScript();
          ?>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script>
                  $('div.pagination ul.pagination li').each(function () {
                      var link = $(this).find('a');
                      link.attr("href", link.attr('href') + "&viewId=<?php echo $viewId; ?>&tnewsid=" +<?php echo $tabActiveId; ?>)});
                    </script>
</body>
</html>
