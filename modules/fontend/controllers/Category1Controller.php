<?php

namespace app\modules\fontend\controllers;


use app\components\helpers\SessionHelper;
use app\models\Category;
use app\models\Product;
use app\models\User;
use app\components\helpers\Menu;
use app\models\News;
use app\components\helpers\LocationHelper;
use app\components\helpers\UploadImage;
use yii;
use app\modules\fontend\controllers\Controllers;
use yii\data\Pagination;

class Category1Controller extends Controllers
{
    public function actionIndex($category)
    {
//         die;
       $root = Category:: find()->where(['link'=>$category])->asArray()->one();

        $query = Category::find()->where(['parent_id'=>$root['id']]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 15]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)->orderBy('id desc')
            ->all();
        return $this->render($this->mobile .'index', [
            'models' => $models,
            'pages' => $pages,
        ]);

    }
}
