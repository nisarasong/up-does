<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }
    public function deleteTrash() {
      try {
        $dir = storage_path().'\framework\views';
      $objOpen = opendir($dir);
      while (($file = readdir($objOpen)) !== false){
        if ($file != "." && $file != "..") {
          $file ;
          unlink(storage_path()."/framework/views"."/".$file);
        }
      }closedir($objOpen);
        return redirect('home?mes=deOK');
      } catch (\Exception $e) {
        return redirect('home?mes=deError');
      }



    }

}
