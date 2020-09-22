<?php

namespace app\components\helpers;

use Yii;

class HelperBase {

    public static function convertDatetimeByFormat($time, $format = 'd-m-Y') {
        return date($format, strtotime($time));
    }

    public static function createNewsMediaTitle($title, $length = 250) {

        if (strlen($title) > $length) {

            $subLength = self::getLastChar($title, $length);
            $title = substr($title, 0, $subLength) . '...';
        }

        return $title;
    }

    public static function getLastChar($title, $lenght = 250) {
        $char = substr($title, $lenght - 1, 1);
        if ($char === ' ') {
            return $lenght - 1;
        } else {
            return self::getLastChar($title, $lenght - 1);
        }
    }

    public static function getstring($title, $length = 100) {
        if (strlen($title) > $length) {

            $title = substr($title, 0, $length);
        }
        return $title;
    }

    public static function getTitle($title) {
        $title = str_replace(array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '+', '=', '-', '<', '>', '?', ',', '.', '`', '/', '|'), '', $title);
        return $title;
    }

}
