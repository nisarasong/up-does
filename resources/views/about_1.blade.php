<!doctype html>
<?php
/* หน้าปรัญญา วิสัยทัศน์ และคำขวัญ ขอเว็บ กบศ. */
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
        <?php $blog->blogOnC("cid-qHIXZx80S1 mbr-fullscreen mbr-parallax-background", "header2-b", "0.5", "18,18,18"); ?>
        <div class="container align-center">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-2">{{__("does")}}</h1>
                    <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-4">{{__("up")}}</h1><hr>
                    <p class="mbr-text pb-3 mbr-fonts-style display-5"><strong>
                            " {{__("slogan1")}} "
                        </strong></p>

                </div>
            </div>
        </div>
        <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
            <a href="#next">
                <i class="mbri-down mbr-iconfont"></i>
            </a>
        </div>
        <?php $blog->blogOffC(); ?>

        <?php $blog->blogOnC("mbr-section content4 cid-qHIYSX2Sny", "content4-c", "0", "0,0,0"); ?>
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-8">
                    <h2 class="align-center pb-3 mbr-fonts-style display-2">
                        {{__("name")}}
                    </h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">{{__("th")}}:
                        <div><strong>กบศ. (กองบริการการศึกษา)&nbsp;</strong></div><br><div>{{__("eng")}}:<strong>
                            </strong></div><div><strong>DOES (Division Of Educational Services)&nbsp;</strong></div></h3>

                </div>
            </div>
        </div>
        <?php $blog->blogOffC(); ?>

        <?php $blog->blogOnC("mbr-section content5 cid-qHIZcrCg1O mbr-parallax-background", "content5-d", "0", "0,0,0"); ?>
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-8">
                    <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                        {{__("a")}}
                    </h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
                        " {{__("b")}} "
                    </h3>
                </div>
            </div>
        </div>
        <?php $blog->blogOffC(); ?>

        <?php $blog->blogOnC("mbr-section article content10 cid-qHIZxRHWap", "content10-f", "0", "0,0,0"); ?>
        <div class="container">
            <div class="inner-container" style="width: 66%;">
                <hr class="line" style="width: 25%;">
                <div class="section-text align-center mbr-white mbr-fonts-style display-5"><strong>
                        {{__("c")}}
                    </strong><div>{{__("d")}}
                    </div><div></div></div>
                <hr class="line" style="width: 25%;">
            </div>
        </div>
        <?php $blog->blogOffC(); ?>

        <?php $blog->blogOnC("mbr-section article content1 cid-qHIZKPj8qz", "content1-g", "0", "0,0,0"); ?>
        <div class="media-container-row">
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-5"><strong>{{__("slogan")}}
                </strong><div><strong>" {{__("slogan1")}} "</strong></div></div>
        </div>
    </div>
    <?php $blog->blogOffC(); ?>

    <?php
    $menu->footer();
    $header->getScript();
    ?>
</body>
</html>
