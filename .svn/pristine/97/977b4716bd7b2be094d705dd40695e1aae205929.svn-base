
<?php

class custom {

    function getCustom($nameCustom) {
        try {
            include_once(app_path() . '/frontend/custom/' . $nameCustom . '.php');
        } catch (exception $e) {
            echo '<h1>ไม่พบไฟล์ Custom</h1>';
        }
    }

}

?>
