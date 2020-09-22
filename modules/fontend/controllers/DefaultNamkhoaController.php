<?php

namespace app\modules\fontend\controllers;

use app\components\helpers\Cache;
use app\models\Category;


class DefaultNamkhoaController extends Controllers
{
    public function actionIndex()
    {
        $root = Category:: find()->where(['link'=>'nam-khoa'])->asArray()->one();
        $this->title = $root["meta_seo"];
        $this->description = $root["description"];
        $this->keywords = $root["meta_seo"];
        $this->image = 'https://namhocsaigon.com'.$root['image_ad'];
        $this->link = '/'.$root['link'];
        return $this->render($this->mobile . 'index', [
            'slider' => Cache::setSlider('pc'),
            'feedback'=>Cache::setFeedBack(),
            'newshome'=>Cache::setNewsCate(),
            'catshome'=>Cache::getCatsHome()
        ]);
    }
}
