<?php

namespace app\components\helpers;

use Yii;

class HelperRobots
{
    public static function createdRobots($url)
    {
        set_time_limit(0);
        $dirfile = Yii::$app->params['url']['site'] . DIRECTORY_SEPARATOR . 'web/robots.txt';
        if (file_exists($dirfile)) {
            if (file_get_contents($dirfile) != false) {
                $rootpOld = file_get_contents($dirfile);
                $disallow = 'Disallow: ' . $url;
                $robots = $rootpOld . $disallow;
                $fp = fopen($dirfile, "w") or exit("Không Tìm Thấy File Cần Mở! ");
                fwrite($fp, $robots);
                fclose($fp);
            }
        }
    }

    public static function deleteRobots($url)
    {
        $dirfile = Yii::$app->params['url']['site'] . DIRECTORY_SEPARATOR . 'web/robots.txt';
        if (file_exists($dirfile)) {
            $rootpOld = file_get_contents($dirfile);
            if (isset($rootpOld)) {
                $disallow = 'Disallow: ' . $url;
                $sitemapNew = str_replace($disallow, '', $rootpOld);
                $fp = fopen($dirfile, "w") or exit("Không Tìm Thấy File Cần Mở! ");
                fwrite($fp, $sitemapNew);
                fclose($fp);
            }
        }
    }

    public static function updateRobots($url)
    {
        self::deleteRobots($url);
        self::createdRobots($url);
    }

}
