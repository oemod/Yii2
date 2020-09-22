<?php

namespace app\modules\fontend\controllers;


use app\components\helpers\Cache;
use app\components\helpers\UploadImage;

use app\models\Category;
use app\models\Feedback;
use app\models\Order;
use app\models\namkhoa\TblDathen;
use yii\web\Controller;
use app\components\helpers\Menu;
use app\models\News;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii;
use app\modules\fontend\controllers\Controllers;
use app\models\Slides;

class DefaultController extends Controllers
{
    public function actionIndex()
    {
        $this->index = 'index';
        $this->image = 'https://namhocsaigon.com/themes/assets/images/Logo1.png';
        return $this->render($this->mobile . 'index', [
        	'slider' => Cache::setSlider('pc'),
            'feedback'=>Cache::setFeedBack(),
            'newshome'=>Cache::setNewsCate(),
            'catshome'=>Cache::getCatsHome()
        ]);
    }
    public function actionOrder(){
        $model=new TblDathen();
        $model->site= 'https://namhocsaigon.com/';
        $model->phone= $_GET['phone'];
        $model->name= $_GET['benh'];
        $model->link= $_GET['name'];
        $model->position= $_GET['position'];
        $model->check=0;
        $model->created_at= time();
        $model->ip=Yii::$app->request->userIP;;
        $model->save(false);
    }
}
