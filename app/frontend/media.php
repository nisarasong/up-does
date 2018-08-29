<?php
class media{
    function slide($slide){
        echo '<section class="carousel slide cid-qHrvhQLsTM" data-interval="false" id="slider1-2">
        <div class="ggh">
            <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="9000">
                <ol class="carousel-indicators">';
                for ($i=0; $i < count($slide) ; $i++) {
                  if($i==0){
                    echo '<li data-app-prevent-settings="" data-target="#slider1-2" class="active" data-slide-to="'.$i.'"></li>';
                  }
                  else{
                    echo '  <li data-app-prevent-settings="" data-target="#slider1-2"  data-slide-to="'.$i.'"></li>';
                  }
                  }
                echo '</ol><div class="carousel-inner" role="listbox">';
                for ($i=0; $i < count($slide) ; $i++) {
                  $sli =  explode('(slide)',$slide[$i]);
                  if($i==0){
                    echo '
                        <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url('.url('public/Slides').'/'.$sli[0].');">
                            <div class="container container-slide">
                                <div class="image_wrapper">
                                <a  href="'.$sli[1].'">
                                    <img class="rt"  src="'.url('public/Slides').'/'.$sli[0].'"></a>

                                </div>
                            </div>
                        </div>';
                  }else{
                    echo '<div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url('.url('public/Slides').'/'.$sli[0].');">
                          <div class="container container-slide">
                              <div class="image_wrapper">
                              <a target="_blank" href="'.$sli[1].'">
                                  <img class="rt" src="'.url('public/Slides').'/'.$sli[0].'"></a>
                              </div>
                          </div>
                      </div>';
                  }
                }

                echo '
                <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev"
                    href="#slider1-2">
                    <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next"
                    href="#slider1-2">
                    <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </section>';
    }


    function gallery($pic){
        echo'
        <section class="mbr-section content4 cid-qHrw8zRLwK headLogo" id="content4-6"  >
        <div class="textHeader">
        <center><h1 style="font-size:36px;" class="mbr-element-title  align-center mbr-fonts-style pb-2 display-7"><span class="mbri-photo"></span> <span><a style="color:white;" href="'.url("gallery").'" >รูปภาพ</a></span> <span class="fontawesome-star star"></span></h1></center><hr>
        </div>
        <section class="mbr-gallery mbr-slider-carousel cid-qHrvzirkyz headLogo" id="gallery1-3">

        <div class="container">
            <div>
                <!-- Filter -->
                <!-- Gallery -->
                <div class="mbr-gallery-row">
                    <div class="mbr-gallery-layout-default">
                        <div>
                            <div>';
                            $c=0;
                            for($i=0;$i<count($pic);$i++){
                              $c++;
                               echo '<div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome">
                                    <div href="#lb-gallery1-3" data-slide-to="'.$i.'" data-toggle="modal">
                                        <img src="'.$pic[$i].'" alt="">
                                        <span class="icon-focus"></span>

                                    </div>
                                </div>';
                            }
                            echo'
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- Lightbox -->
                <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true"
                    data-interval="false" id="lb-gallery1-3">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="carousel-inner">';
                                for($i=0;$i<count($pic);$i++){
                                    $item="";if($i==0){$item="active";}
                                    echo '<div class="carousel-item '.$item.'">
                                        <img src="'.$pic[$i].'" alt="">
                                    </div>';}
                                echo'
                                </div>
                                <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery1-3">
                                    <span class="mbri-left mbr-iconfont" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery1-3">
                                    <span class="mbri-right mbr-iconfont" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <a class="close" href="#" role="button" data-dismiss="modal">
                                    <span class="sr-only">Close</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section></section>';
    }
}
?>
