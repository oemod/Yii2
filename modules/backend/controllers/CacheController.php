<?php

namespace app\modules\backend\controllers;

use app\components\helpers\HelperLink;
use app\components\helpers\Sitemaps;
use Yii;
use app\models\Tags;
use app\models\TagsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TagsController implements the CRUD actions for Tags model.
 */
class CacheController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionDelete()
    {
        Yii::$app->cache->flush();
        return $this->redirect(['/backend']);
    }

}
