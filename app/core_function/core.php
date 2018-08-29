<?php

class databaseGet {

    function getYears($table, $type) {
        $query = DB::table($table)->orderBy($type, 'desc')->get();
        $year = "";
        $i = 0;
        foreach ($query as $querys) {
            if ($year != $querys->year) {
                $year = $querys->year;
                $yearout[$i] = $querys->year;
                $i++;
            }
        }
        return $yearout;
    }

    function convertDate($date) {
        $date = new DateTime($date);
        $dateY = $date->format('Y') + 543;
        $dateOut = $date->format('d/m/') . $dateY . " เวลา " . $date->format('H:i:s');
        return $dateOut;
    }

    function convertDateNoTime($date) {
        $date = new DateTime($date);
        $dateY = $date->format('Y') + 543;
        $dateOut = $date->format('d/m/') . $dateY;
        return $dateOut;
    }



    function convertTypeContent($type) {
        if ($type == 1) {
            return 'ข่าวประกาศ';
        } if ($type == 2) {
            return 'นิสิตปริญญาตรี';
        }if ($type == 3) {
            return 'บัณฑิตศึกษา';
        }if ($type == 4) {
            return 'คณาจารย์/เจ้าหน้าที่';
        } else {
            return 'อื่น ๆ';
        }
    }

    function convertTypeNews($type) {
        if ($type == 'text') {
            return "ข้อความ";
        } if ($type == 'file') {
            return "ไฟล์";
        } if ($type == 'url') {
            return "URL";
        }
    }
    function convertShowNewsCat($type) {
        if ($type == 1) {
            return "แสดงวันที่";
        } if ($type == 2) {
            return "แสดงรายการ";
        }
    }
    function explode($text) {
        $var = ( explode('<', $text) );
        return $var[0];
    }

    function img($img, $id) {
        $image = url('public/user' . '/cat') . $id . '/' . $img;
        try {
            $var = ( explode('(ld)', $img) );
            return $var[1];
        } catch (\Exception $e) {
            return $image;
        }
    }

}

?>
