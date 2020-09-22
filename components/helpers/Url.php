<?php

namespace app\components\helpers;

use Yii;

class Url {

    public static function getUrl($url,$number) {
         $question = \app\models\Categorys::findOne(substr($url,$number));
        return $question;
    }
    public static function getUrlTags($url,$number) {
         $tags = \app\models\Tags::findOne(substr($url,$number));
        return $tags;
    }

    public static function getUrlNews($url,$number) {
       // print_r(substr($url,$number));die;
        $tags = \app\models\News::findOne(substr($url,$number));
        return $tags;
    }
     public static function getUrlQuetionUser($url,$number) {
         $question = \app\models\QuestionUser::findOne(substr($url,$number));
        return $question;
    }
   

}
