<?php

namespace app\components\helpers;

use Yii;

class SessionHelper
{

    public static function setSession($name, $value, $time = 3600)
    {
        $session = Yii::$app->session;
        $session->set($name, $value, $time);
    }

    public static function getSession($name)
    {
        $session = Yii::$app->session;
        return $session->get($name);
    }

}
