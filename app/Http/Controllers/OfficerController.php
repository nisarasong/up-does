<?php
namespace App\Http\Controllers;

use App\Officer;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OfficerController extends Controller
{

  public function view()
  {
     return view('officer.index');
  }
  public function showPeople()
  {

    $oid = '0';
    if(isset($_GET["oid"])){
    $oid = $_GET["oid"];
    }
    if(isset($_GET['keyword'])){

        $peoples = Officer::SearchByKeyword($_GET['keyword'],'')->where('oid',$oid)->sortable()->paginate(10);
    }else{
        $peoples = Officer::sortable()->where('oid',$oid)->paginate(10);

    } return view('officer.people',compact('peoples'));


  }
  public function insertOfficer(Request $req)
  {try {
    \DB::table('officer_cat')->insert([
            'o_name_th' => $req->input('o_name_th'),
            'o_name_en' => $req->input('o_name_en'),
            'o_sort' => $req->input('o_sort')
            ]);
            return redirect('officerM?mes=OK');
          } catch (\Exception $e) {
            return redirect('officerM?mes=Error');
          }
}
  public function deldeteOfficer_cat(){
    $id = $_GET['oid'];
    $folder = "/user".'/cat'.$id.'';
    try{
      DB::table('officer_cat')->where('oid', $_GET['oid'] )->delete();
      $success = Storage::deleteDirectory($folder);
      return redirect('officerM?mes=deleteOK');
      }catch(\Exception $e){
      return redirect('officerM?mes=deleteError');
     }

  }
  public function insertPeople(Request $req)
  { $oid = $req->input('oid');
    try{
      DB::table('officer')->insert([
        'oid' => $req->input('oid'),
        'name' => $req->input('name'),
        'sname' => $req->input('sname'),
        'image' => '',
        'tel' => $req->input('tel'),
        'growth' => $req->input('growth'),
        'sort' => $req->input('sort'),
        'create_date' => $req->input('last_date'),
    ]);
    $img = \DB::table('officer')->where('name',$req->input('name'))->get();
    $filenames = 'user'.$img[0]->id.".jpg";
  //  $filenames;
    if ($req->hasFile('image')) {
      /* storeAs = แอดลงโฟล์เดอร์ */
      $imgname = $req->image->storeAs('user/cat'.$oid.'', $filenames); }
    if (!$req->hasFile('image')) {
        $imgname = ""; }
        \DB::table('officer')
        ->where('id',$img[0]->id)
        ->update([
        'image' => $filenames,
        ]);
   return redirect('officerPeople?oid='.$oid.'&mes=inOK');

 }catch(\Exception $e){   return redirect('officerPeople?oid='.$oid.'&mes=inError');}

  }

  public function deleteOfficer()
  {
    $oid = $_GET['oid'];
    $id = $_GET['id'];
    try{ $filename = '/user'.$id.'.jpg';
    unlink(public_path() ."/user"."/cat".$oid.$filename);}catch(\Exception $e){}
      try{
        DB::table('officer')->where('id', $id )->delete();
        return redirect('officerPeople?mes=deOK&oid='.$oid);
        }catch(\Exception $e){
        return redirect('officerPeople?mes=deError&oid='.$oid);
        }
  }

  public function editOfficer(Request $req)
  {
    $oid = $req->oid;
    try {

    $filenames =  'user'.$req->input('id').'.jpg';
    //try{unlink(public_path() . "/user/".$filenames);}catch(\Exception $e){}
    try{
      if ($req->hasFile('image')) {
        /* storeAs = แอดลงโฟล์เดอร์ */
        $imgname = $req->image->storeAs('user/cat'.$oid.'',$filenames); }
      if (!$req->hasFile('image')) {
          $filenames = "link(ld)".$req->input('link'); }
    }catch(Exception $e){
      $filenames = "link(ld)".$req->input('link');
    }

    \DB::table('officer')
            ->where('id', $req->input('id'))
            ->update([
            'name' => $req->input('name'),
            'sname' => $req->input('sname'),
            'image' => $filenames,
            'tel' => $req->input('tel'),
            'growth' => $req->input('growth'),
            'sort' => $req->input('sort'),
            ]);
            return redirect('officerPeople?mes=OK&oid='.$req->input('oid'));
  } catch (\Exception $e) {
  return redirect('officerPeople?mes=Error&oid='.$req->input('oid'));
  }
  }

  public function editOfficer_cat(Request $req)
  {try {

    \DB::table('officer_cat')
            ->where('oid', $req->input('oid'))
            ->update([
            'o_name_th' => $req->input('o_name_th'),
            'o_name_en' => $req->input('o_name_en'),
            'o_sort' => $req->input('o_sort')
            ]);
            return redirect('officerM?mes=updateOK');
  } catch (\Exception $e) {
  return redirect('officerM?mes=updateError');
  }


}


}
 ?>
