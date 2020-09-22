<?php

namespace app\modules\fontend\controllers;

use app\components\helpers\Cache;
use app\components\helpers\UploadImage;
use app\models\Category;
use app\models\Feedback;
use app\models\Order;
use yii\web\Controller;
use app\components\helpers\Menu;
use app\models\News;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii;
use app\modules\fontend\controllers\Controllers;
use app\models\Slides;

class DefaultBenhxahoiController extends Controllers {

    public function actionIndex() {
        $root = Category:: find()->where(['link'=>'benh-xa-hoi'])->asArray()->one();
        $this->title = $root["meta_seo"];
        $this->description = $root["description"];
        $this->keywords = $root["meta_seo"];
        $this->image = 'https://namhocsaigon.com'.$root['image_ad'];
        $this->link = '/'.$root['link'];
        return $this->render($this->mobile . 'index', [
                    'slider' => Cache::setSlider('pc'),
                    'feedback' => Cache::setFeedBack(),
                    'newshome' => Cache::setNewsCate(),
                    'catshome' => Cache::getCatsHome()
        ]);
    }


}
