<?php

namespace App\Http\Controllers;

use App\GalleryCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GalleryController extends Controller {


    public function gallery_cat_show() {
        if(isset($_GET['keyword'])){
            $gallery = GalleryCat::SearchByKeyword($_GET['keyword'],'')->sortable()->paginate(10);
        }else{
            $gallery = GalleryCat::sortable()->orderBy('create_date', 'desc')->paginate(10);
         
        }   return view('gallery.index',compact('gallery'));
   
    }

    public function gallery_show() {

    }

    public function gallery_test() {

    }

}
