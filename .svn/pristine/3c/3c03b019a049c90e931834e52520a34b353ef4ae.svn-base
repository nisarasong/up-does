<!doctype html>
<?php
//INCLUDE File for use class and new instance;
include_once(app_path() . '/frontend/header.php');
include_once(app_path() . '/frontend/menu.php');
include_once(app_path() . '/frontend/media.php');
include_once(app_path() . '/frontend/custom.php');
include_once(app_path() . '/frontend/blog.php');
include_once(app_path() . '/core_function/core.php');

//NEW Instance class for use;
$header = new header();
$menu = new menu();
$media = new media();
$custom = new custom();
$blog = new blog();
$db = new databaseGet();
?>

<html lang="{{ app()->getLocale() }}">
    <head>

        <?php
        $header->getHead("");
        $header->getCss();
        $custom->getCustom('custom_index');
        ?>
    </head>
    <body>
        <?php $menu->navbar("black"); ?>
        <?php $blog->blogOnC("tabs2 cid-qHJ9gv4gsu", "tabs2-r", "0", "0,0,0"); ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                        $blog->tabsPanel("ข่าวประชาสัมพันธ์", "tabs2-r_tab0");
                        $blog->tabsPanel("ประกาศ", "tabs2-r_tab1");
                        $blog->tabsPanel("ระเบียบ", "tabs2-r_tab2");
                        $blog->tabsPanel("ข้อบังคับ", "tabs2-r_tab3");
                        $blog->tabsPanel("ปฏิทินกิจกรรม", "tabs2-r_tab4");
                        $blog->tabsPanel("จดหมายข่าว UP-DOES", "tabs2-r_tab5");
                        $blog->tabsPanel("ประชาสัมพันธ์งานรับเข้า", "tabs2-r_tab6");
                        $blog->tabsPanel("ข่าวกิจกรรม", "tabs2-r_tab3");
                        ?>
                    </ul>
                  </div>
                  <div class="col-md-12">
                      <hr>
                      <?php
                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                            </div>
                          </div>
                        </div>
                        <!-- end of panel -->

                        <div class="panel">
                          <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible item #2
                          </a>
                        </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                            </div>
                          </div>
                        </div>
                        <!-- end of panel -->

                        <div class="panel">
                          <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible item #3
                          </a>
                        </h4>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                            </div>
                          </div>
                        </div>
                        <!-- end of panel -->

                        <div class="panel">
                          <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Collapsible item #4
                          </a>
                        </h4>
                          </div>
                          <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                            </div>
                          </div>
                        </div>
                        <!-- end of panel -->

                      </div>
                      <!-- end of #accordion -->

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

<?php ?>
