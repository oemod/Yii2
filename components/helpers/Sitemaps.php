<?php

namespace app\components\helpers;

use Yii;

class Sitemaps {
    public static function createdSitemapNews($newsLink,$priority) {
        set_time_limit(0);
        $dirfile = Yii::$app->params['url']['site'] . DIRECTORY_SEPARATOR . 'web/sitemap.xml';


        $link = Yii::$app->params['url']['sitemaps'] . $newsLink;

        if (file_exists($dirfile)) {

            if (file_get_contents($dirfile) != false) {

                $sitemapOld = file_get_contents($dirfile);

                $url = "<url><loc>".Yii::$app->params['url']['website']."</loc></url>";
//                echo $url; die;
                $url.= '<url><loc>' . $link . '</loc>';
                $url.= '<changefreq>daily</changefreq>';
                $url.= '<priority>'. $priority.'</priority>';
                $url.= '</url>';
               // echo $url; die;
               $replace ='<url><loc>https://namhocsaigon.com/</loc></url>';

                // echo $url; die;
                $sitemapNew = str_replace($replace,$url, $sitemapOld);

                // echo $sitemapNew; die;
                $fp = fopen($dirfile, "w") or exit("Không Tìm Thấy File Cần Mở! ");
                fwrite($fp, $sitemapNew);
                fclose($fp);
        }
    }
    }

    public static function deleteUrlSitemap($urlsitemap,$priority) {

        $sitemap = Yii::$app->params['url']['site'] . DIRECTORY_SEPARATOR . 'web/sitemap.xml';
        $link = Yii::$app->params['url']['website'] . $urlsitemap;

//        echo $link; die;

        if (file_exists($sitemap)) {
            $sitemapOld = file_get_contents($sitemap);
            if (isset($sitemapOld)) {
                $url = '<url>';
                $url.= '<loc>' . $link . '</loc>';
                $url.= '<changefreq>daily</changefreq>';
                $url.= '<priority>'. $priority.'</priority>';
                $url.= '</url>';
                $sitemapNew = str_replace($url, '', $sitemapOld);
                $fp = fopen($sitemap, "w") or exit("Không Tìm Thấy File Cần Mở! ");
                fwrite($fp, $sitemapNew);
                fclose($fp);
            }
        }
    }

    public static function updateSitemapNews($newsLink,$priority) {
        self::deleteUrlSitemap($newsLink,$priority);
        self::createdSitemapNews($newsLink,$priority);
    }

}
