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




@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-sm-8">
            <?php
            $gallery = DB::table('gallery_cat')->orderBy('create_date', 'desc')->get();
            ?>
            <a data-toggle="modal" data-target="#makeAl"  class="btn btn-success">สร้างอัลบั้ม</a></td>
            <script>
                $(document).ready(function () {
                    $('#example').DataTable({
                        "order": [[3, "desc"]]

                    });
                });
            </script>


            <table    id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อ</th>
                        <th>Lastname</th>
                        <th>สร้งโดย</th>
                        <th>แก้ไข</th>
                        <th>รูปภาพ</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($gallery as $gallerys) {
                        echo '<tr>

                                  <td>' . $i++ . '</td>
                                  <td>' . $gallerys->g_name_th . '</td>
                                  <td>' . $gallerys->last_user . '</td>
                                  <td>' . $db->convertDate($gallerys->create_date) . '</td>
                                  <td><a data-toggle="modal" data-target="#myModal" data-id="' . $gallerys->gid . '" data-name="' . $gallerys->g_name_th . '" class="btn btn-primary">แก้ไข</a></td>
                                  <td><a href="' . url('galleryAdd') . '?gid=' . $gallerys->gid . '" class="btn btn-primary">รูปภาพ</a></td>

                                  <td><a  href="' . action('Controller@delete_gal') . '?gid=' . $gallerys->gid . '" class="btn btn-danger">ลบ</a></td>
                                </tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form action="{{action('Controller@update')}}" method="post">
                    {{csrf_field()}}
                    <h2>รหัสอัลบั้ม</h2>

                    <input type="text"   id="gid" name="gid" />
                    <h2>ชื่ออัลบั้ม</h2>
                    <textarea required id="g_name_th" name="g_name_th">  </textarea>
                    <h3>แก้ไขโดย : {{ Auth::user()->name }}</h3>
                    <input type="hidden"  value="{{ Auth::user()->name }}" id="last_user" name="last_user"   />
                    <h3>เวลาแก้ไขล่าสุด : {{date("Y-m-d h:m:s")}}</h3>
                    <input type="hidden"  value="{{date("Y-m-d h:m:s")}} " id="last_date" name="last_date"   />

                           <input type="submit" value="Update" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="makeAl" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form action="{{action('Controller@insert_gal')}}" method="post">
                    {{csrf_field()}}
                    <input type="text"  placeholder="ชื่อภาษาไทย" id="g_name_th" name="g_name_th" required/>

                    <input type="text"  value="gallery{{date("Y-m-d h:m:s")}}" placeholder="ชื่อภาษาอังกฤษ" id="g_name_en" name="g_name_en" required/>

                           <input type="text"  value="{{ Auth::user()->name }}" placeholder="create_user" id="create_user" name="create_user" required/>

                    <input type="text"  value="{{date("Y-m-d h:m:s")}}" placeholder="create_date" id="create_date" name="create_date" required/>

                           <input type="text"  value="{{ Auth::user()->name }}" placeholder="last_user" id="last_user" name="last_user" required/>

                    <input type="text"  value="{{date("Y-m-d h:m:s")}}"  placeholder="last_date" id="last_date" name="last_date" required/>
                           <input type="submit" value="Create" />
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var sent1 = button.data('name') // Extract info from data-* attributes
        var sent2 = button.data('id')
        var modal = $(this)

        modal.find('.modal-body #g_name_th').val(sent1)
        modal.find('.modal-body #gid').val(sent2)
    })
</script>
@endsection
