<?php

namespace app\components\helpers;



class Helper {

    public static function ConvertPrice($string) {
        return floatval(str_replace(',', '', $string));
    }

    /**
     * Lấy path node
     * @param type $id
     * @param array $path
     * @return type
     * author : quang.nh
     */

    /**
     * Chuyển đổi giờ hỗ trợ tiếng việt
     * @param type $value
     * @return type
     */
    public static function convertTime($value) {
        $condition = time() - $value;
        $days = floor($condition / (60 * 60 * 24));
        $text = '';

        if ($condition > 5 && $condition <= 60) {
            $text = 'Đăng ' . $condition . ' giây trước';
        }
        if ($condition > 60 && $condition <= 3600) {
            $minute = floor($condition / 60);
            $second = $condition - ($minute * 60);
            $text = 'Đăng ' . $minute . ' phút ' . $second . ' giây trước';
        }
        if ($condition > 3600 && $condition <= 86400) {
            $hour = floor($condition / 3600);
            $minute = floor(($condition - ($hour * 3600)) / 60);
            $text = 'Đăng ' . $hour . ' giờ ' . $minute . ' phút trước';
        }
        if ($condition > 86400 && $condition <= 172800) {
            $text = 'Đăng hôm qua, ' . date('H : i', $value);
        }
        if ($condition > 172800 && $condition <= 259200) {
            $text = 'Đăng hôm kia';// . date('H : i', $value);
        }

        if ($condition > 259200) {
            $text = 'Đăng ' . $days . ' ngày trước';
        }

        return $text;
    }
    public static function substrText($text,$start,$end)
    {
        if($text == null)
        {
            $text ="";
        }
        return substr($text,$start,$end)." ...";
    }
    public static function arraySort($Array, $SortBy=array(), $Sort = SORT_REGULAR) {
        if (is_array($Array) && count($Array) > 0 && !empty($SortBy)) {
            $Map = array();
            foreach ($Array as $Key => $Val) {
                $Sort_key = '';
                foreach ($SortBy as $Key_key) {
                    $Sort_key .= $Val[$Key_key];
                }
                $Map[$Key] = $Sort_key;
            }
            asort($Map, $Sort);
            $Sorted = array();

            foreach ($Map as $Key => $Val) {
                $Sorted[] = $Array[$Key];
            }
            return array_reverse($Sorted);
        }
        return $Array;
    }
}
