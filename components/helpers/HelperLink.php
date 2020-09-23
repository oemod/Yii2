<?php

namespace app\components\helpers;

use Yii;

class HelperLink
{
    public static function rewriteUrl($id, $title, $action)
    {
        $link = Yii::getAlias('@web') . '/' . $action . '/' . UrlTransliterate::cleanString($title) . '-' . $id;
        return urldecode($link);
    }

    public static function rewriteUrllink($id, $title, $action)
    {
        $link = Yii::getAlias('@web') . $action . '/' . UrlTransliterate::cleanString($title) . '-' . $id;
        return urldecode($link);
    }

    public static function rewriteXl($id, $title, $action)
    {
        $link = Yii::getAlias('@web') . '/' . $action;
        return urldecode($link);
    }

    static function rewriteUrlml($id, $title, $action)
    {
        $link = Yii::getAlias('@web') . $action . '' . UrlTransliterate::cleanString($title) . $id;
        return urldecode($link);
    }

    static function rewriteUrllin($id, $title, $action)
    {
        $link = Yii::getAlias('@web') . '/' . $action . '' . UrlTransliterate::cleanString($title) . $id;
        return urldecode($link);
    }

    public static function rewriteUrlMulti($params, $title, $action)
    {
        $link = Yii::getAlias('@web') . '/' . $action . '/' . UrlTransliterate::cleanString($title) . '-' . implode('-', $params) . '.html';
        return urldecode($link);
    }

    public static function rewriteUrlNews($title, $catgory)
    {
        $link = Yii::getAlias('@web') . UrlTransliterate::cleanString($catgory) . '/' . UrlTransliterate::cleanString($title);
        return urldecode($link);
    }

    public static function rewriteUrlCategory($title)
    {
        $link = Yii::getAlias('@web') . UrlTransliterate::cleanString($title);
        return urldecode($link);
    }

    public static function rewriteNews($title)
    {
        $link = Yii::getAlias('@web') . '/' . UrlTransliterate::cleanString($title);
        return urldecode($link);
    }

    public static function rewriteSulg($title)
    {
        $link = Yii::getAlias('@web') . UrlTransliterate::cleanString($title);
        return urldecode($link);
    }
}
