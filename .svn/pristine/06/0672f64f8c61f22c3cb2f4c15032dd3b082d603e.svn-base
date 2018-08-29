<?php 

class Dialog{

    public $err1 = "ไฟล์มีปัญหา";

    public function test(){
        ?>
        
        <?php
    }
    function errorMessage($id,$detail){
        ?>
            <script type="text/javascript">
                $(window).on('load',function(){$('#<?php echo $id; ?>').modal('show');});
            </script>
            <div class="modal fade" id="<?php echo $id; ?>" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body text-center ">
                            <div class="text-center" style="font-size:6em; color:Tomato;">
                                <i class="fas fa-exclamation-triangle faa-pulse animated"></i>
                            </div>
                            <h2 class="modal-title text-center ">เกิดข้อผิดพลาด</h2>
                            <p class="text-center " style="font-size:16px;">เนื่องจาก: <?php echo $detail; ?></p>
                            <br><button type="button" style="font-size:18px;" class="btn btn-info btn-lg" data-dismiss="modal">ตกลง</button>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    function customMessageWithLink($id,$title,$icon,$color,$data,$url,$url2,$text,$btn){
        ?>
            <script type="text/javascript">
                $(window).on('load',function(){$('#<?php echo $id; ?>').modal('show');});
            </script>
            <div class="modal fade" id="<?php echo $id; ?>" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body text-center ">
                            <div class="text-center" style="font-size:6em; color:<?php echo $color; ?> ;">
                                <i class="<?php echo $icon; ?> faa-pulse animated"></i>
                            </div>
                            <h2 class="modal-title text-center "><?php echo $title; ?> </h2>
                            <p class="text-center " style="font-size:16px;"><?php echo $data; ?></p>
                            <br><a href="<?php echo $url; ?>" style="font-size:18px;" class="btn btn-info btn-lg" >ตกลง</a>
                                <a href="<?php echo $url2; ?>" style="font-size:18px;" class="<?php echo $btn; ?> btn-lg" ><?php echo $text; ?></a>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        
    }

    function customMessageDefault($id,$title,$icon,$color,$data,$url){
        ?>
            <script type="text/javascript">
                $(window).on('load',function(){$('#<?php echo $id; ?>').modal('show');});
            </script>
            <div class="modal fade" id="<?php echo $id; ?>" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body text-center ">
                            <div class="text-center" style="font-size:6em; color:<?php echo $color; ?> ;">
                                <i class="<?php echo $icon; ?> faa-pulse animated"></i>
                            </div>
                            <h2 class="modal-title text-center "><?php echo $title; ?> </h2>
                            <p class="text-center " style="font-size:16px;"><?php echo $data; ?></p>
                            <br><a href="<?php echo $url; ?>" style="font-size:18px;" class="btn btn-info btn-lg" >ตกลง</a>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        
    }

    function infoMessage($id,$title,$iconA,$iconb,$colorA,$colorB){
        ?> <script type="text/javascript">
        $(window).on('load',function(){$('#<?php echo $id; ?>').modal('show');});
    </script>
        <div class="modal fade" id="<?php echo $id; ?>" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body text-center ">
                        <div class="text-center" style="font-size:6em; color:<?php echo $colorA; ?>;">
                        <span class="fa-layers fa-fw" >
                        <i class="<?php echo $iconA; ?>"></i>
                        <span class="fa-layers-counter" style="background:<?php echo $colorB; ?>;"><i class="<?php echo $iconb; ?>"></i></span>
                         </span>
                        </div>
                        <h2 class="modal-title text-center "><?php echo $title; ?></h2>
                        <br><button type="button" style="font-size:18px;" class="btn btn-info btn-lg" data-dismiss="modal">ตกลง</button>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

?>