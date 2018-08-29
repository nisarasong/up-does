<?php

class header {

    private $web_title;

    function getHead($title) {
        if ($title == "") {
            $title = "กองบริการการศึกษา มหาวิทยาลัยพะเยา";
        }
        echo'<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v4.6.2, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/logs.png" type="image/x-icon">
        <meta name="description" content="">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <title>' . $title . '</title>';

    }

    function getCss() {

        echo'
        <link rel="stylesheet" href="' . asset('assets/web/assets/mobirise-icons/mobirise-icons.css') . '">
        <link rel="stylesheet" href="' . asset('assets/tether/tether.min.css') . '">
        <link rel="stylesheet" href="' . asset('assets/bootstrap/css/bootstrap.min.css') . '">
        <link rel="stylesheet" href="' . asset('assets/bootstrap/css/bootstrap-grid.min.css') . '">
        <link rel="stylesheet" href="' . asset('assets/bootstrap/css/bootstrap-reboot.min.css') . '">
        <link rel="stylesheet" href="' . asset('assets/dropdown/css/style.css') . '">
        <link rel="stylesheet" href="' . asset('assets/socicon/css/styles.css') . '">
        <link rel="stylesheet" href="' . asset('assets/theme/css/style.css') . '">
        <link rel="stylesheet" href="' . asset('assets/gallery/style.css') . '">
        <link href="' . asset('assets/fonts/style.css" rel="stylesheet') . '">
        <link rel="stylesheet" href="' . asset('assets/icon/animate_icon.css') . '">
        <link rel="stylesheet" href="' . asset('assets/mobirise/css/mbr-additional.css" type="text/css">') . '';

    }

    function getScript() {
        echo'
        <script src="' . asset('assets/web/assets/jquery/jquery.min.js') . '"></script>
        <script src="' . asset('assets/popper/popper.min.js') . '"></script>
        <script src="' . asset('assets/tether/tether.min.js') . '"></script>
        <script src="' . asset('assets/bootstrap/js/bootstrap.min.js') . '"></script>
        <script src="' . asset('assets/smoothscroll/smooth-scroll.js') . '"></script>
        <script src="' . asset('assets/dropdown/js/script.min.js') . '"></script>
        <script src="' . asset('assets/touchswipe/jquery.touch-swipe.min.js') . '"></script>
        <script src="' . asset('assets/vimeoplayer/jquery.mb.vimeo_player.js') . '"></script>
        <script src="' . asset('assets/masonry/masonry.pkgd.min.js') . '"></script>
        <script src="' . asset('assets/imagesloaded/imagesloaded.pkgd.min.js') . '"></script>
        <script src="' . asset('assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js') . '"></script>
        <script src="' . asset('assets/ytplayer/jquery.mb.ytplayer.min.js') . '"></script>
        <script src="' . asset('assets/theme/js/script.js') . '"></script>
        <script src="' . asset('assets/slidervideo/script.js') . '"></script>
        <script src="' . asset('assets/gallery/player.min.js') . '"></script>
        <script src="' . asset('assets/gallery/script.js') . '"></script>
    ';
    }

}

?>
