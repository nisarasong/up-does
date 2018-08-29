<?php
/* หน้าเพิ่มข่าวสาร */
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
?>
@extends('layouts.navbar')

@section('content')
<div class="main-content">
    <h2>เพิ่มข่าวสาร
    </h2>
    <hr>
    <form method="post" action="{{ action('NewsController@store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="group">หมวดหมู่ :</label>
            <select class="form-control" id="group" name="group">
                <?php
                $news = DB::table('news_cat')->orderBy('type_news_cat','desc')->get();
                $a = 0;
                $b = 0;
                $c = 0;
                $d = 0;
                $e = 0;
                foreach ($news as $new) {
                    if ($new->type_news_cat == "1" && $a == 0) {
                        echo '<optgroup label="แสดงที่หน้าข่าวประกาศ">';
                        $a++;
                    }else if ($new->type_news_cat == "2" && $b == 0) {
                        echo '<optgroup label="แสดงที่หน้านิสิตปริญญาตรี">';
                        $b++;
                    } else if ($new->type_news_cat == "3" && $c == 0) {
                        echo '<optgroup label="แสดงที่หน้าบัณฑิตศึกษา">';
                        $c++;
                    } else if ($new->type_news_cat == "4" && $d == 0) {
                        echo '<optgroup label="แสดงที่หน้าคณาจารย์/เจ้าหน้าที่">';
                        $d++;
                    } else if ($new->type_news_cat != "1" && $new->type_news_cat != "2" && $new->type_news_cat != "3" && $new->type_news_cat != "4" && $e == 0) {
                        echo '<optgroup label="อื่นๆ">';
                        $e++;
                    }
                    echo '<option value="'.$new->id.'">'.$new->name_th.'</option>';
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="user" value="{{ Auth::user()->username }}"/>
        <input type="hidden" name="date" value="<?php
        date_default_timezone_set("Asia/Bangkok");
        echo date("Y-m-d H:i:s");
        ?>"/>
        <div class="form-group">
            <label for="order">ลำดับ:</label>
            <input type="number" class="form-control" id="order" name="order">
        </div>
        <div class="form-group">
            <label for="title_th">หัวข้อภาษาไทย:</label>
            <input type="text" class="form-control" id="title_th" name="title_th">
        </div>
        <div class="form-group">
            <label for="title_en">หัวข้อภาษาอังกฤษ:</label>
            <input type="text" class="form-control" id="title_en" name="title_en">
        </div>
        <div class="form-group">
            <label for="title_en">อัพโหลดรูปภาพ:</label>
            <input class="btn btn-default" type="file" name="img" >
        </div>
        <div class="form-group">
            <label for="type">ประเภทข่าว:</label>
            <select class="form-control" id="sel" name="type">
              <option selected="selected" value="file">FILE</option>
              <option value="url">URL</option>
                <option  value="text">ข้อความ</option>

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
                        <textarea id="editor1" name="text_th" rows="10" cols="80"></textarea>
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
                        <textarea id="editor2" name="text_en" rows="10" cols="80"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group type_u">
            <label>URL</label>
            <input name="url" type="text" class="form-control" placeholder="Enter ..."/>
        </div>
        <div class="form-group type_f">
            <input class="btn btn-default" type="file" name="file" />
        </div>
        <button value="Upload" type="submit" class="btn btn-primary ">บันทึก</button>
    </form>
</div>

<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
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
@endsection
