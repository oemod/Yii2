<?php

namespace app\modules\fontend\controllers;

use app\components\helpers\Cache;
use app\models\Category;
use app\models\Menu;
use app\models\News;
use app\models\Tags;
use Yii;
use app\models\Thread;
use app\components\helpers\ThreadHelper;
use app\models\StorageImage;
use yii\data\Pagination;

class TagsController extends Controllers
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


    public function actionIndex($id = 0)
    {
        $query= News::find() ->select('category.name,user.username,news.*')
            ->innerJoin('category', '`category`.`id` = `news`.`category_id`')
            ->innerJoin('user', '`user`.`id` = `news`.`user_id`')
            ->innerJoin('new_tag', '`new_tag`.`new_id` = `news`.`id`')
            ->where(['new_tag.tag_id'=>$id])
            ->limit(25);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize' => 15]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)->orderBy('news.id desc')
            ->all();
        $tags = Tags::findOne($id);
        return $this->render($this->mobile . 'index', [

            'models' => $models,
            'pages' => $pages,
            'tags'=>$tags
        ]);

    }


}
