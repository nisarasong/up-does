<?php

class MediaManager{

    public $path = '/Gallerys/pic';



    public function viewIndexImageByID($id){
        $dir =  public_path() . "\Gallerys\pic" . $id;
        $pic = "";
        try{
            if (isset($dir)) {
                if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $pic = url('public/Gallerys/pic' . $id . '/' . $file . '');
                        break;
                        $i++;
                    }
                }
                closedir($dh);
            }}
            if($pic == ""){ $pic = url("public/Gallerys/img/nullimage.jpg");}
            return $pic;
        }catch(exception $e){
            $pic = url("public/Gallerys/img/nullimage.jpg");
            return $pic;
        }

    }
    public function viewIndexImageAll($id){
        $dir =  public_path() . "\Gallerys\pic" . $id;
        $pic = "";
        try{
            if (isset($dir)) {
                if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $pic = url('/Gallerys/pic' . $id . '/' . $file . '');
                        echo '<div class="col-md-4">';
                        echo '<div class="col-md-12">';
                        echo '  <img src="'.$pic.'" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> ';
                        echo '</div>';
                        echo '<div class="col-md-12 ">';
                        echo '<a href="" style="width:95%;" class="btn btn-danger "><i class="fas fa-trash-alt"></i> ลบ</a>';
                        echo'</div>';
                        echo '<div class="col-md-12"><br></div>';
                        echo'</div>';
                        $i++;
                    }
                }
                closedir($dh);
            }}
            if($pic == ""){ $pic = url("/Gallerys/img/nullimage.jpg");}

        }catch(exception $e){
            $pic = url("/Gallerys/img/nullimage.jpg");

        }

    }



}
?>
