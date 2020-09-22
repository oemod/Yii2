<?php

namespace app\modules\fontend\controllers;


use app\components\helpers\SessionHelper;
use app\models\Categorys;
use app\models\Product;
use app\models\User;
use app\components\helpers\Menu;
use app\models\News;
use app\components\helpers\LocationHelper;
use app\components\helpers\UploadImage;
use yii;
use app\modules\fontend\controllers\Controllers;
use yii\data\Pagination;

class SearchController extends Controllers
{
    public function actionIndex($search = '')
    {
        $this->description = $search;
        $this->keywords = $search;
        $this->title = $search;
        $query = News::find()->where(['news.ping_status'=>News::STATUS_ACTIVE])->andWhere(['like', 'post_title', $search]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 15]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)->orderBy('id desc')
            ->all();
        return $this->render($this->mobile .'index', [
            'title' => $search,
            'models' => $models,
            'pages' => $pages,
        ]);

    }
}
