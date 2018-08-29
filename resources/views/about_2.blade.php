<!doctype html>
<?php
/* หน้าประวัติหน่วยงาน ขอเว็บ กบศ. */
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
    <?php $blog->blogOnC("cid-qHJ1wwHRud mbr-fullscreen mbr-parallax-background", "header2-h", "0.5", "0,0,0"); ?>
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    {{__("history")}}
                </h1>
                <p class="mbr-text pb-3 mbr-fonts-style display-5">{{__("does")}} {{__("up")}}</p>
            </div>
        </div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
                <i class="mbri-down mbr-iconfont"></i>
            </a>
    </div>
    <?php $blog->blogOffC(); ?>
    <?php $blog->blogOnC("mbr-section article content9 cid-qHJ2ExJpZQ", "content9-k", "0", "0,0,0"); ?>
    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5">ความเป็นมาเกี่ยวกับการจัดตั้ง กองบริการการศึกษา มหาวิทยาลัยพะเยา นั้น<br>สืบเนื่องกันมาตั้งแต่เมื่อครั้งยังเป็นมหาวิทยาลัยนเรศวร
                วิทยาเขตสารสนเทศพะเยา <br>ซึ่งมีที่ตั้งอยู่ ณ ตำบลแม่กา อำเภอเมือง จังหวัดพะเยา ตั้งแต่ปี พ.ศ. 2542 เป็นต้นมา
                <br>โดยขณะนั้นใช้ชื่อว่า ส่วนงานวิชาการ ในปี 2544 ได้แยกหน่วยงานย่อยออกเป็น 3 หน่วย ดังนี้<br>1. หน่วยธุรการ
                <div>2. หน่วยทะเบียนและประมวลผล
                </div>
                <div>3. หน่วยส่งเสริมและพัฒนาวิชาการ</div>
            </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
    <?php $blog->blogOffC(); ?>
    <?php $blog->blogOnC("mbr-section article content10 cid-qHJ2PTRjbU", "content10-l", "0", "0,0,0"); ?>
    <div class="container">
        <div class="inner-container" style="width: 66%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-white mbr-fonts-style display-5">ต่อมาในปี 2545 ได้แยกหน่วยงานย่อยออกเป็น 5 หน่วย <br>ประกอบด้วย
                <div>1. หน่วยธุรการ
                </div>
                <div>2. หน่วยทะเบียนและประมวลผล
                </div>
                <div>3. หน่วยส่งเสริมและพัฒนาวิชาการ
                </div>
                <div>4. หน่วยรับเข้าศึกษา
                </div>
                <div>5. หน่วยวิเทศสัมพันธ์</div>
            </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
    <?php $blog->blogOffC(); ?>
    <?php $blog->blogOnC("mbr-section article content9 cid-qHJ31Tj8Lu", "content9-m", "0", "0,0,0"); ?>
    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5">&nbsp; เมื่อวันที่ 12 กรกฎาคม 2553 พระบาทสมเด็จพระเจ้าอยู่หัวภูมิพลอดุลยเดช<br>ได้มีพระบรมราชโองการโปรดเกล้าฯ
                ให้ตราพระราชบัญญัติมหาวิทยาลัยพะเยา พ.ศ. 2553 ขึ้น และประกาศในราชกิจจานุเบกษา เมื่อวันที่ 16 กรกฎาคม 2553
                จึงถือได้ว่า มหาวิทยาลัยพะเยา<br>ได้แยกออกจากมหาวิทยาลัยนเรศวร อย่างเต็มรูปแบบ ส่วนงานวิชาการ จึงได้รับการยกฐานะเป็น<br>กองบริการการศึกษา
                ภายใต้โครงสร้างใหม่ประกอบด้วย 6 งาน ดังนี้&nbsp;<br>1. งานธุรการ
                <div>2. งานพัฒนาหลักสูตร
                </div>
                <div>3. งานรับเข้า
                </div>
                <div>4. งานทะเบียนนิสิตและประมวลผล
                </div>
                <div>5. งานสนับสนุนวิชาการ
                </div>
                <div>6. งานวิเทศสัมพันธ์</div>
            </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
    <?php $blog->blogOffC(); ?>
    <?php $blog->blogOnC("mbr-section article content10 cid-qHJ2PTRjbU", "content10-l", "0", "0,0,0"); ?>
    <div class="container">
        <div class="inner-container" style="width: 66%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-white mbr-fonts-style display-5">ต่อมาในปี พ.ศ. 2556 มหาวิทยาลัยพะเยาได้อนุมัติให้เปลี่ยนชื่อ “งานรับเข้า” เป็น “งานรับเข้าศึกษา”
            </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
    <?php $blog->blogOffC(); ?>
    <?php $blog->blogOnC("mbr-section article content9 cid-qHJ31Tj8Lu", "content9-m", "0", "0,0,0"); ?>
    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5">&nbsp; หลังจากนั้นในปี พ.ศ. 2557 มหาวิทยาลัยพะเยาได้อนุมัติให้ปรับโครงสร้าง<br>การบริหารกองบริการการศึกษา ตามมติที่ประชุมคณะกรรมการบริหารมหาวิทยาลัยพะเยา<br>ครั้งที่
                75(9/2557) ระเบียบวาระที่ 4.2 โดยอนุมัติให้รับบุคลากรจาก โครงการจัดตั้งศูนย์การเรียนรู้อิเล็กทรอนิกส์มาปฏิบัติงานในกองบริการการศึกษา
                จึงทำให้โครงสร้างการบริหารกองบริการการศึกษาแบ่งออกเป็น 7 งาน ดังนี้
                <div>1. งานธุรการ
                </div>
                <div>2. งานพัฒนาหลักสูตร
                </div>
                <div>3. งานรับเข้าศึกษา
                </div>
                <div>4. งานทะเบียนนิสิตและประมวลผล
                </div>
                <div>5. งานสนับสนุนวิชาการ
                </div>
                <div>6. งานวิเทศสัมพันธ์</div>
                <div>7. งานส่งเสริมนวัตกรรมและพัฒนาการจัดการเรียนการสอน</div>
            </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
    <?php $blog->blogOffC(); ?>
    <?php
        $menu->footer();
        $header->getScript();
        ?>
</body>
</html>