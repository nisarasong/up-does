<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use DB;
use File;
use App\Http\Controllers\Image;
use App\Exceptions\Handle;
use Illuminate\Support\Facades\Storage;

class slideController extends Controller
{
    //
    public function show()
    {
        $slide = DB::table('slideshow')->get();
        return view('slideshow/index',compact('slide'));
    }

    public function add()
    {
        return view('slideshow/slideadd');
    }

    public function savePH(Request $request) {
      try{
        $filenames = date("dymhis").'.jpg';
        $time = date("Y-m-d h:m:s");
        foreach ($request->img_name as $photo) {
            $filename = $photo->storeAs('/Slides',$filenames);
        }
        $slide = DB::table('slideshow')->insert([
          'create_user' => $request->input('create_user'),
          'last_user' => $request->input('create_user'),
          'last_date' => $time,
          'url' => $request->input('url'),
           'orders' => $request->input('orders'),
           'des' => $request->input('des'),
           'img_name' => $filenames,
           'create_date' => $time

       ]);
       return redirect('slideshow?mes=addSlideshowOK');
     }catch(\Exception $e){
        return redirect('slideshow?mes=addSlideshowError');
     }
}
    public function edit($id)
    {
        $slide = DB::table('slideshow')->where('id',$id)->first();
        return view('slideshow/editslide',compact('slide'))->with('id',$id);
    }

    public function setDes()
    {
      if ( isset($_GET['id'])) {
        $des = explode('py',$_GET['id']);
        $slide = [
             'des' => $des[1]
        ];
        DB::table('slideshow')->where('id',$des[0])->update($slide);
        return redirect('/slideshow');
      }
     }

    public function update(Request $request){
      try{
            $slide = [
                'url' => $request->input('url'),
                'orders' => $request->input('orders'),
                'des' => $request->input('des'),
                'last_user' => $request->input('create_user'),
               'last_date' => date("Y-m-d h:m:s")
            ];
            DB::table('slideshow')->where('id',$request->input('id'))->update($slide);
            return redirect('slideshow?mes=updateSlideshowOK');
            }catch(\Exception $e){
             return redirect('slideshow?mes=updateSlideshowError');
            }
}

function delete() {
  try{

    $id = $_GET['id'];
    $name = $_GET['name'];
    DB::table('slideshow')->where('id',$id)->delete();
    unlink(public_path() . "/Slides"."/" . $name);
    return redirect('slideshow?mes=deleteOK');


}catch(\Exception $e){ return redirect('slideshow?mes=deleteError');}

}
}
