<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use PHPUnit\Runner\Exception;
use Intervention\Image\ImageManagerStatic;


class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    function insert(Request $req) {
        \DB::table('gallery_cat')->insert(
                [
                    'g_name_th' => $req->input('g_name_th'),
                    'g_name_en' => $req->input('g_name_en'),
                    'create_user' => $req->input('create_user'),
                    'create_date' => $req->input('create_date'),
                    'last_user' => $req->input('last_user'),
                    'last_date' => $req->input('last_date')]);

        echo'OK';
    }

    function insert_gal(Request $req) {
        try{
            \DB::table('gallery_cat')->insert(
                [
                    'g_name_th' => $req->input('g_name_th'),
                    'g_name_en' => $req->input('g_name_en'),
                    'create_user' => $req->input('create_user'),
                    'create_date' => $req->input('create_date'),
                    'last_user' => $req->input('create_user'),
                    'last_date' => $req->input('create_date')]);
        $idAlbum = \DB::table('gallery_cat')->where('g_name_th',$req->input('g_name_th'))->get();
        $ida = "";
        foreach($idAlbum as $ida){
        $ida = $ida->gid;
        }
        return redirect('galleryM?mes=createAlbumOK&al='.$ida);
        }catch(\Exception $e){
            return redirect('galleryM?mes=createAlbumError');
        }

    }

    function update(Request $req) {
        try{
            \DB::table('gallery_cat')
            ->where('gid', $req->input('gid'))
            ->update(['g_name_th' => $req->input('g_name_th'), 'last_user' => $req->input('last_user'), 'last_date' => $req->input('last_date')]);
            return redirect('galleryM?mes=fileUpdateOK');
        }catch(\Exception $e){
            return redirect('galleryM?mes=fileUpdateError');
        }

    }

    function delete_gal() {
         try{
             $id= $_GET['gid'];
            \DB::table('gallery_cat')->where('gid', $id)->delete();
         }catch(\Exception $e){
            return redirect('galleryM?mes=errorDB');
         }
         try{
            $success = \File::deleteDirectory(public_path() . "/Gallerys/pic".$id."/");
            return redirect('galleryM?mes=fileDelOK');
         }catch(\Exception $e){
            return redirect('galleryM?mes=errorFile');
         }

    }

    function img_del() {
        try{
            $id = $_GET['gid'];
            $url = $_GET['path'];
            echo $id;
            echo $url;
            $path = 'galleryAdd?gid=' . $id;
            echo '<br>' . public_path() . "/Gallerys/pic" . $id . "/" . $url;
            unlink(public_path() . "/Gallerys/pic" . $id . "/" . $url);

            //return  redirect('home');
            return redirect($path.'&mes=DelImgOk');
        }catch(\Exception $e){  return redirect($path.'&mes=DelImgError');}

    }

    function upload_gal(Request $request) {
         try{
            $path = 'galleryAdd?gid=' . $request->gid;
            foreach ($request->photos as $photo) {
                try{
                  $filename =  $photo->storeAs($request->path,'img'.date("_dMY_hisa").'.'.$photo->clientExtension());
                  $filesaveName =  $filename;
               
                }catch(\Exception $e){
                  continue;
                }
                sleep(1);
             }

             return redirect($path.'&mes=UploadOk');
         }catch(\Exception $e){
            return redirect($path.'&mes=UploadError');
         }

    }


        function resize_image($path,$filetype,$w,$h) {

            if ($filetype == 'jpg') {
                $srcImg = imagecreatefromjpeg($path);
            } else
            if ($filetype == 'jpeg') {
                $srcImg = imagecreatefromjpeg($path);
            } else
            if ($filetype == 'png') {
                $srcImg = imagecreatefrompng($path);
            } else
            if ($filetype == 'gif') {
                $srcImg = imagecreatefromgif($path);
            }else{$srcImg = imagecreatefromjpeg($path);}

            $origWidth = imagesx($srcImg);
            $origHeight = imagesy($srcImg);

            $thumbImg = imagecreatetruecolor($w, $h);
            imagecopyresized($thumbImg, $srcImg, 0, 0, 0, 0, $w, $h, $origWidth, $origHeight);

            if ($filetype == 'jpg') {
                imagejpeg($thumbImg, $path);
            } else
            if ($filetype == 'jpeg') {
                imagejpeg($thumbImg, $path);
            } else
            if ($filetype == 'png') {
                imagepng($thumbImg, $path);
            } else
            if ($filetype == 'gif') {
                imagegif($thumbImg, $path);
            }
        }

        function convertImage( $input_path, $output_path,$w,$h)
        {
        $image = imagecreatefromstring(file_get_contents($input_path));
        $origWidth = imagesx($image);
        $origHeight = imagesy($image);
        $thumbImg = imagecreatetruecolor($w,$h);
        $white = imagecolorallocate($thumbImg,  255, 255, 255);
        imagefilledrectangle($thumbImg, 0, 0, $w, $h, $white);
        imagecopyresized($thumbImg, $image, 0, 0, 0, 0, $w, $h, $origWidth, $origHeight);
        imagejpeg($thumbImg, $output_path);
        imagedestroy($image);
        }


    function galleryView($id) {

        //return view('public.galleryView');
    }

}?>
