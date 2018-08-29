<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class AutoController extends BaseController
{



    public function autoinsert(Request $req)
    {
      $table = $req->table;
      $back = $req->back;
      $news = \DB::connection()->getSchemaBuilder()->getColumnListing($table);
      $field="";
      $data="";
      for ($i=0; $i < count($news) ; $i++) {
if($i!=0){
      $field.=$news[$i];
      $data.= "'".$req->input($news[$i])."'";
      if($i<count($news)-1){$field.=","; $data.=","; }}
    }
    $db =  "insert INTO ".$table." ($field)VALUES ($data)";
          \DB::insert($db, [1]);
          return  redirect($back);

    }

    public function autoread(){

    }

    public function autodelete(){
      $getTable = $_GET['table'];
      $getId = $_GET['id'];
      $getIdValue = $_GET['id_value'];
      $back = $_GET['back'];
      \DB::table($getTable)->where($getId, $getIdValue)->delete();

       return  redirect($back);



    }

    public function autopreupdate(){
      $getTable = $_GET['table'];
      $getId = $_GET['id'];
      $getIdValue = $_GET['id_value'];
      $back = $_GET['back'];
      $db = \DB::connection()->getSchemaBuilder()->getColumnListing($getTable);
      $data = \DB::table($getTable)->where($getId,$getIdValue)->get();

      echo '<form  action="'.url('autoupdate').'" method="post">';
      echo csrf_field();
      for($i=0;$i<count($db);$i++){
        $dt = get_object_vars($data[0]);
        echo '<input type="text" value="'.$dt[$db[$i]].'" name="'.$db[$i].'" required><br><br>';
      }
      echo '<input type="hidden" name="back" value="'.$back.'">';
      echo '<input type="hidden" name="id" value="'.$getId.'">';
      echo '<input type="hidden" name="idvalue" value="'.$getIdValue.'">';
      echo '<input type="hidden" name="table" value="'.$getTable.'">';
      echo '<input type="submit" name="" value="ตกลง">';
      echo '</form>';

      //print_r($data);
    //  \DB::table($getTable)->where($getId, $getIdValue)->delete();

    //   return  redirect($back);

    }

    public function autoupdate(Request $req){
      $table = $req->table;
      $back = $req->back;
      $getId = $req->id;
      $getIdValue = $req->idvalue;
      $news = \DB::connection()->getSchemaBuilder()->getColumnListing($table);
      $field="";
      $data="";
      for ($i=0; $i < count($news) ; $i++) {
      if($i!=0){
      $field.="`".$news[$i]."`='".$req->input($news[$i])."'";
      if($i<count($news)-1){$field.=","; }}
      }
      //UPDATE MyGuests SET lastname='Doe' WHERE id=2
      $db =  "update ".$table." set $field where $getId = $getIdValue";
        \DB::update($db, [1]);
        return  redirect($back);
    }

}
