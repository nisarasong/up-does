@extends('layouts.navbar')

@section('content')
<div class="main-content">
    <h2>แก้ไขหมวดหมู่</h2>
    <hr>
    <form method="post" action="{{action('GroupContentController@update', $id)}}">
        {{csrf_field()}}
        <?php foreach ($gcontents as $new) { ?>
            <input name="_method" type="hidden" value="PATCH">
            <input name="id" type="hidden" value="{{$new->id}}">
            <div class="col-md-12">
                <div class="form-group ">
                  <label for="name">ประเภทข่าว:</label>
                  <select class="form-control" id="sel1" name="type">
                    <option value="1">ข่าวประกาศ</option>
                    <option value="2">นิสิตปริญญาตรี</option>
                    <option value="3">บัณฑิตศึกษา</option>
                    <option value="4">คณาจารย์/เจ้าหน้าที่</option>
                  </select>
                </div>
                <div class="form-group ">
                    <label for="name">ลำดับ:</label>
                    <input type="text" class="form-control" name="order" value="{{$new->order}}" >
                </div>
                <div class="form-group ">
                    <label for="name">ชื่อหมวดหมู่ภาษาไทย:</label>
                    <input type="text" class="form-control" name="name_th" value="{{$new->name_th}}">
                </div>

                <div class="form-group">
                    <label for="price">ชื่อหมวดหมู่ภาษาอังกฤษ:</label>
                    <input type="text" class="form-control" name="name_en" value="{{$new->name_en}}">
                    <input type="hidden" id="cname" name="last_user" value="{{ Auth::user()->name }}">
                    <input type="hidden" id="create_date" name="last_date" value="<?php echo date("Y-m-d H:i:s"); ?>">
                </div>

                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">บันทึก</button>
                </div>
            </div>
        </form>
    <?php } ?>

    @endsection
