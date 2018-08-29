<?php
class menu{
    function navbar($color){
        if($color == "1" or $color == "black"){$color = "";}
        else {$color = "transparent";}
        echo'<section class="menu cid-qHrv4G4zit" once="menu" id="menu1-0 ">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color '.$color.'">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo" id="navpc">
                        <a href="'.url("").'">
                             <img src="'.asset('assets/images/logo5.png').'" alt="Mobirise" title="" style="height: 2.4rem !important;">
                        </a>
                    </span>
                    <span class="navbar-logo" id="navmobile">
                    <a href="'.url("").'">
                         <img src="'.asset('assets/images/logom.png').'" alt="Mobirise" title="" style="height: 1.8rem !important;">
                    </a>
                </span>

                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                <li class="nav-item">
                        <a class="nav-link link text-white fonty" href="'.url("").'">
                            <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                            '.__("home").'</a>
                    </li>
                    <li class="nav-item dropdown open"><a class="nav-link link text-white dropdown-toggle fonty" href="" data-toggle="dropdown-submenu" aria-expanded="true"><span class="mbri-hot-cup mbr-iconfont mbr-iconfont-btn"></span>

                            '.__("recommend").'</a><div class="dropdown-menu"><a class="text-white dropdown-item fonty" href="'.url("about_home").'">'.__("vision").'</a><a class="text-white dropdown-item fonty" href="'.url("about_history").'" aria-expanded="true">'.__("history").'</a><a class="text-white dropdown-item fonty" href="'.url("about_people").'" aria-expanded="false">'.__("structure").'</a></div></li>
                            <li class="nav-item"><a class="nav-link link text-white fonty" href="'.url("news").'"><span class="mbri-contact-form mbr-iconfont mbr-iconfont-btn"></span>

                            '.__("news").'</a></li><li class="nav-item">
                            <a class="nav-link link text-white fonty" href="'.url("student").'"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>

                            '.__("std").'</a></li><li class="nav-item"><a class="nav-link link text-white fonty" href="'.url("graduate").'"><span class="mbri-user2 mbr-iconfont mbr-iconfont-btn"></span>

                            '.__("gradstd").'</a></li>
                    <li class="nav-item">
                        <a  class="nav-link link text-white fonty" href="'.url("officer2").'"><span class="mbri-users mbr-iconfont mbr-iconfont-btn"></span>

                            '.__("staff").'</a>
                    </li>
                    <li class="nav-item">
                    <a  class="nav-link link text-white fonty" href="'.url("gallery").'"><span class="mbri-photo mbr-iconfont mbr-iconfont-btn"></span>

                        '.__("gallery").'</a>
                </li>
                    </ul>

            </div>
        </nav>
    </section>';
    }

    function footer(){

        foreach (Config::get('languages') as $lang => $language){
            if ($lang != App::getLocale()){

                    $langs = route('lang.switch', $lang);}

        }


        echo '<section class="footer4 cid-qHrUY4r8hn" id="footer4-7">
        <div class="container">
            <div class="media-container-row content mbr-white">
                <div class="col-sm-3">
                    <div class="mb-3 img-logo">
                        <a href="#">
                            <img style="height: 45px;" src="assets/images/logo-832x274.png">
                        </a>
                    </div>
                    <p class="mb-4 mbr-fonts-style foot-title display-7">
                    <a href="https://www.facebook.com/does.up.73" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                    </a>  '.__("does").'
                        <br>
                        <b>'.__("up").'</b>
                    </p>
                    <div class="social-list pl-0 mb-0">
                        <div class="soc-item">
<hr>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 foot-title mbr-fonts-style display-7">
                    <a style="color:white;" target="_blank" href="http://www.up.ac.th/">'.__("up").'</a>
                    <br>
                    <a style="color:white;" target="_blank" href="http://www.reg.up.ac.th/"> '.__("reg").' </a>
                    <br>
                    <a style="color:white;" target="_blank" href="http://admission.up.ac.th"> '.__("admission").' </a>
                    <br>
                    <a style="color:white;" target="_blank" href="http://tqf.up.ac.th">'.__("tqf").'</a>
                    <br>
                    <a style="color:white;" target="_blank" href="http://grad.up.ac.th"> '.__("grad").'</a>
                    <br>
                    <a style="color:white;" target="_blank" href="https://ithesis.up.ac.th">'.__("ithesis").'</a>
                    <br>
                </div>

                <div class="col-sm-offset-1 col-sm-5 mbr-fonts-style display-7">

                    <a style="color:white;" target="_blank" href="http://www.up.ac.th/Manual_Students.aspx">'.__("Manual_Students").'</a>
                    <br>
                    <a style="color:white;" target="_blank" href="http://www.does.up.ac.th/up_reg_manual.pdf">'.__("up_reg_manual").'</a>
                    <br>
                    <a style="color:white;" target="_blank" href="http://www.does.up.ac.th/upload/grd_for_std.pdf">'.__("grd_for_std").'</a>
                    <br>
                    <a style="color:white;" target="_blank" href="http://www.does.up.ac.th/upload/grd_for_staff.pdf"> '.__("grd_for_staff").'</a>
                </div>
            </div>
            <div class="footer-lower" style="height:5vh;">

                <div class="media-container-row mbr-white">
                    <div class="col-sm-8 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">
                      '.__("credit").' </p>
                    </div>
                    <div class="col-sm-4 copyright" style="text-align:right;">
                      <a  style="color:white;" href="'.$langs.'"><span class="mbri-globe-2 mbr-iconfont mbr-iconfont-btn"></span> '.__("lang").'</a>
                    </div>

                </div>
            </div>
        </div>
    </section>';
    }
}



?>
