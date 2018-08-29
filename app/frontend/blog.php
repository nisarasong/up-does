<?php

class blog {

    private $switchContainer;

    function blogOn($classCss, $overray, $container) {

        if ($container == "onF") {
            $this->switchContainer = "container-fluid";
        } else if ($container == "on") {
            $this->switchContainer = "container";
        } else {
            $this->switchContainer = '';
        }

        echo '<section class="tabs3 ' . $classCss . ' mbr-parallax-background" id="tabs3-8" >
        <div class="mbr-overlay" style="opacity: ' . $overray . '; background-color: rgb(0, 0, 0);"></div>';
        if ($this->switchContainer != '') {
            echo '<div class="' . $this->switchContainer . '">
            <div class="row">';
        }
    }

    function blogOff() {
        if ($this->switchContainer != '') {
            echo '</div></div>';
        }
        echo ' </section >';
    }

    function blogOnC($custom, $customid, $overray, $color) {
        echo '<section class="' . $custom . '" id="' . $customid . '">
        <div class="mbr-overlay" style="opacity: ' . $overray . '; background-color: rgb(' . $color . ');"></div>
        ';
    }

    function blogOffC() {
        echo '</section>';
    }

    function nullBlog($num) {
        echo'<div class="col-sm-' . $num . '"></div>';
    }

    function bloguser($url, $h1, $h2, $h3) {
        echo ' <div class="testimonials-item">
        <div class="user row">
          <div class="col-lg-3 col-md-2">
            <div class="user_image">
              <img src="' . $url . '" alt="" title="">
            </div>
          </div>
          <div class="testimonials-caption col-lg-9 col-md-8">
            <div class="user_text ">
              <p class="mbr-fonts-style  display-5"><em>' . $h1 . '</em></p>
            </div>
            <div class="user_name mbr-bold mbr-fonts-style align-left pt-3 display-7">
                 ' . $h2 . '</div>
            <div class="user_desk mbr-light mbr-fonts-style align-left pt-2 display-7">' . $h3 . '</div>
          </div>
        </div>
      </div>';
    }

    function tabsPanel($h1, $tabid) {
        echo '<li class="nav-item" ><a class="nav-link mbr-fonts-style active display-7" style="" role="tab" data-toggle="tab" href="#' . $tabid . '" aria-expanded="true">
        ' . $h1 . '</a></li>';
    }

    function tabsPaneOn($tabid, $a) {
        echo '
        <div id="' . $tabid . '" class="tab-pane ' . $a . '" role="tabpanel">
            <div class="row">
                <div class="col-md-12"><hr>
                    <div class="container-fluid text-center bg-grey">
                         <div class="row text-center">';
    }

    function tabsPaneBody($url, $h1, $h2) {
        echo '
        <div class="col-sm-3">
            <div class="thumbnail">
                <img src="' . $url . '" style="width:50%;">
                <p class="mbr-fonts-style display-7"><strong>' . $h1 . '</strong></p>
                <p class="mbr-fonts-style display-7">' . $h2 . '</p>
            </div>
        </div>';
    }

    function tabsPaneOff() {
        echo "</div>
                    </div>
                </div>
            </div>
        </div>";
    }

    function divOn($name, $style) {
        echo '<div class="' . $name . '" style="' . $style . '">';
    }

    function divOff() {
        echo '</div>';
    }

    function h($h, $text, $style) {
        echo '<h' . $h . ' style="' . $style . '">' . $text . '</h' . $h . '>';
    }

    function ul($style) {
        echo '<ul style="' . $style . '">';
    }

    function eul() {
        echo '</ul>';
    }

    function timeLine($title, $main, $date, $link, $style) {
        echo '<li >
        <h3 class="display-7" style="' . $style . '">' . $title . ' <time class="display-7">' . $date . '</time></h3><hr>
        <p class="display-7">' . $main . '</p>
        <hr>
        <a href="' . $link . '" class="display-7">ดูรายละเอียด</a>
      </li>';
    }


        function timeLine2($title, $main, $date, $link, $style) {
            echo '<div class="container" style="border-radius: 20px; box-shadow:0 3px 36px 0 rgba(0, 0, 0, 0.6); background-color:white; 	border: 5px solid #ffffff;   width:60vw;" ><br>
            <h3 class="display-7" style="' . $style . '">' . $title . ' <time class="display-7">' . $date . '</time></h3><hr>
            <p class="display-7" style="text-align:left;">' . $main . '</p>
            <hr>
            <a target="_blank" href="' . $link . '" class="display-7">ดูรายละเอียด</a>
          <br><br></div><br>';
        }

    function tableOn() {
        echo '<div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              ปีการศึกษา
            </a>
          </h4>
            </div>';
    }
    function tableList($title, $main, $date, $link) {
        echo '
        <tbody>
        <tr>
        <td>'.$main.' <a style="color:blue;" href="' . $link . '">ดูรายละเอียด</a></td>
        </tr>



      ';
    }
    function tableOff() {
        echo '<hr></tbody></table>
        ';
    }

}
?>
