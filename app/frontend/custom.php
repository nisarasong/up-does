
<?php

class custom {

function getCustom($nameCustom) {
        try {
            include_once(app_path() . '/frontend/custom/' . $nameCustom . '.php');
        } catch (exception $e) {
            echo '<h1>ไม่พบไฟล์ Custom</h1>';
        }
    }

function createTabMenu($objectData,$new_catByGetUrl,$locale,$show,$url){
  $active = '';
  echo '<div class="col-md-12">'.
          '<ul class="nav nav-tabs" role="tablist">';

  foreach ($objectData as $key) {
  $active = ($new_catByGetUrl == $key->id )?'active':'';
   $dataView = ($locale == 'th')?$key->name_th:$key->name_en;
  echo '<li class="" >'.
          '<a class="nav-link mbr-fonts-style display-7 '.$active.'" style=""  href="'.(url($url).'?tnewsid='.$key->id).'&viewId='.$key->view.'" >'.
          $dataView.
          '</a>'.
        '</li>';

  }
  if($show == 1){
  echo '<li class="" >'.
          '<a class="nav-link mbr-fonts-style display-7" target="_blank" style=""  href="http://www.reg.up.ac.th" >'.
          'ปฏิทินการศึกษา'.
          '</a>'.
        '</li>';
}
  echo '</ul>'.
       '</div>';
}

  function getLink($type,$data){
    switch ($type) {
    case '0':
        return url('/public/Gallerys') . '/'.$data;
        break;
    case '1':
        return url('/public/Slides') . '/'.$data;
        break;
    case '2':
        return $data;
        break;
    case '3':
        return url('/public/upload') . '/'.$data;
        break;
    case '4':
        return url('/public/uploadimg') . '/'.$data;
        break;
    case '5':
        return url('/public/user') . '/'.$data;
        break;
    case '6':
      return 'http://www.does.up.ac.th/upload/'.$data;
      break;
    case '7':
      return url('').'/assets/images/Picture2.png';
      break;
    }

  }


  function getViewList($objectData2,$idOld,$head){
    $locale = App::getLocale();
    echo '<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>';
    $link ="";
    echo '<div class="panel-heading" ></div>
    <div class="panel-body" >';
    foreach ($objectData2 as $key ) {
      $dataView = ($locale == 'th')?$key->title_th:$key->title_en;
      $link ="";

          if($key->type == "file"){
            $getLinkAt = $key->file;
            $link = ($key->nid >= $idOld)?$this->getLink('3',$getLinkAt):$this->getLink('6',$getLinkAt);
          }
          else if($key->type == "text"){$getLinkAt = ($locale == 'th')?$key->text_th:$key->text_en ;
            $linkd = 'class="display-7"  data-toggle="modal" data-target="#'. $key->nid . '"';
            $link = $this->getLink('2',$linkd);
            echo'
                <!-- Modal -->
                <div id="' . $key->nid . '" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title text-center">ข่าว</h4>
                      </div>
                      <div class="modal-body">
                        ' . $dataView . '
                        <hr>
                        ' . $getLinkAt. '
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>';
          }
          else {  $getLinkAt = $key->url;
              $link = $this->getLink('2',$getLinkAt);
          }
          $dataHead = ($key->type != 'text')?'href="'.$link.'" class="display-7"':$link;

      echo '<i class=" fas fa-chevron-right "></i>  <a target="_blank" '.$dataHead.'>'.$dataView.'</a><br>';
    }
    echo '</div>';

    }

  function getViewDefault($objectData2,$idOld,$date){
    include_once(app_path() . '/core_function/core.php');
    $db = new databaseGet();
    $locale = App::getLocale();

    foreach ($objectData2 as $key) {
      echo '<div class="row"><br>';
      $dataView = ($locale == 'th')?$key->title_th:$key->title_en;
      $link ="";

      if($key->type == "file"){
        $getLinkAt = $key->file;
        $link = ($key->nid >= $idOld)?$this->getLink('3',$getLinkAt):$this->getLink('6',$getLinkAt);
      }
      else if($key->type == "text"){$getLinkAt = ($locale == 'th')?$key->text_th:$key->text_en ;
        $linkd = 'class="display-7"  data-toggle="modal" data-target="#'. $key->nid . '"';
        $link = $this->getLink('2',$linkd);
        echo'
            <!-- Modal -->
            <div id="' . $key->nid . '" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-center">ข่าว</h4>
                  </div>
                  <div class="modal-body">
                    ' . $dataView . '
                    <hr>
                    ' . $getLinkAt. '
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>';
      }
      else {  $getLinkAt = $key->url;
          $link = $this->getLink('2',$getLinkAt);
      }
      $dataHead = ($key->type != 'text')?'href="'.$link.'" class="display-7"':$link;
      $dateView = ($date == 1)? $db->convertDate($key->create_date_new):'';
      echo '<div class="col-sm-1">'.
            '<img src="' . $imgh =($key->img != "" && $key->cat != 47)?$this->getLink('4',$key->img):$this->getLink('7',$key->img). '" style="height:60px; width:65px;" alt="" />
            </div>
            <div class="col-sm-11">
            <a target="_blank" '.$dataHead.'>'.$dataView.'
            <br><span style="text-align:left!important; font-size:12px; color:#D3D3D3; ">' .$dateView. '</span>
            </a>
            </div>
            <div class="col-sm-12"><hr></div>
            ';
          echo '</div>';
    }

  }



}

?>
