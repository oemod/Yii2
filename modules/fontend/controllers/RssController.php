<?php

namespace app\modules\fontend\controllers;

use app\components\helpers\Cache;
use app\components\helpers\Helper;
use app\components\helpers\UploadImage;
use app\components\helpers\Response;
use app\models\Config;
use app\models\Contact;
use app\models\Like;
use app\models\Menu;
use app\models\News;
use app\models\Order;
use app\components\helpers\HelperLink;
use app\models\Product;
use app\models\Follow;
use Yii;
use yii\db\Exception;


class RssController extends Controllers
{

    public function init()
    {
        parent::init();
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $news= News::find()->limit(30)->Where(['news.active'=>News::STATUS_ACTIVE])->orderBy('created_at DESC')->all();
        header('Content-Type: text/xml; charset=utf-8');
       /* echo ('<?xml version="1.0" encoding="utf-8"?>');*/
        echo ('<rss version="2.0" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" >');
        echo ('<channel>');
        echo('<title><![CDATA[Phòng Khám Gan Kim Mã]]></title>');
        echo('<link><![CDATA['.$this->website.'rss/]]></link>');
        echo('<description><![CDATA[Phòng Khám Kim Mã RSS]]></description>');
        if($news){
           foreach($news as $value)
            {
                echo'<item>
                  <title>'.$value->title.'</title>
                  <description>
                  <![CDATA[
                      <a href='. HelperLink::rewriteUrl($value->id, $value->title, Yii::$app->params['url']['detail']).'>
                        <img width=130 height=100 src='.UploadImage::Image('news', $value->image, 470, $value->created_at).' />
                      </a>
                      </br>'. $value->description.'
                  ]]>
                  </description>
                  <pubDate></pubDate>
                  <link>'.Yii::$app->params['url']['sitemaps'].''.HelperLink::rewriteUrl($value->id, $value->title, Yii::$app->params['url']['detail']).'</link>
                  <guid></guid>
                  <slash:comments>0</slash:comments>
                </item>';
            }
        }
        echo ('</channel>');
        echo ('</rss>');
    }


}
