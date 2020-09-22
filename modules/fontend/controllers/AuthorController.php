<?php

namespace app\modules\fontend\controllers;

use app\components\helpers\Cache;
use app\models\Category;
use app\models\Menu;
use app\models\News;
use app\models\Author;
use Yii;
use app\models\Thread;
use app\components\helpers\ThreadHelper;
use app\models\StorageImage;
use yii\data\Pagination;

class AuthorController extends Controllers
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


    public function actionIndex($title)
    {
        $model = Author::find()->where(['link' => $title])->one();
        if ($model->meta_title){
            $this->title = $model->meta_title ;
        }
        if ($model->meta_description){
            $this->description = $model->meta_description ;
        }
        if ($model->active == 1){
            $this->index = 'index' ;
        }else{
            $this->index = 'noindex' ;
        }
        $this->image = $model->image ;

        $query =  News::find()->select(['post_title','post_name','image','created_at'])->where(['author_id'=>$model['id']])->orWhere(['doctor_id'=>$model['id']]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 10]);
        $news = $query->offset($pages->offset)
            ->limit($pages->limit)->asArray()->orderBy('id desc')
            ->all();
        return $this->render($this->mobile.'index', [
            'model' => $model,
            'news'=>$news,
            'pages'=>$pages
        ]);

    }


}
