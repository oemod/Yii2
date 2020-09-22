<?php

namespace app\modules\fontend\controllers;

use app\components\helpers\Cache;
use app\components\helpers\HelperLink;
use app\models\Category;
use app\models\Author;
use app\models\News;
use Yii;
use app\models\Thread;
use app\components\helpers\ThreadHelper;
use app\models\StorageImage;
use yii\data\Pagination;

class ListController extends Controllers
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


    public function actionIndex($title,$category_name='')
    {

        if (empty($title)) {
            return $this->redirect('/site/404');
        }
        $arr= explode(".",$category_name);

        if(isset($arr[1])){
           return $this->redirect('https://namhocsaigon.com/'.$title.'/'.$arr[0]);
        }
        if($category_name){
            if($title=='tag'){
                $category = Category::find()->where(['link'=>$title.'/'.$category_name])->andWhere(['type'=>'post_tag'])->one();
            }else{
                $category = Category::find()->where(['link'=>$title.'/'.$category_name])->andWhere(['type'=>'category'])->one();
            }

            if(!isset($category )){
                return $this->redirect('/site/404');
            }

            $query = News::find()
                ->leftJoin('news_category', '`news_category`.`news_id` = `news`.`id`')
                ->where(['news_category.category_id' => $category->id])
                ->orderBy('news.id DESC');

            $getCatsChild = Category::find()->where(['parent_id'=>$category->id])
                ->orderBy('category.id DESC')->all();
            $relatedCats = Category::find()->where(['parent_id'=>$category->parent_id])
                ->orderBy('category.id DESC')->all();
        }else{

            $category = Category::find()->where(['link'=>$title])->andWhere(['type'=>'category'])->one();
            $categoryArr = Category::find()->where(['parent_id' => $category->id])->orWhere(['id'=> $category->id])->all();
            $CategorysArray = array();
            $CategorysTitleArray = array();
            foreach ($categoryArr as $key => $value) {
                $CategorysArray[$key] = $value->id;
                $CategorysTitleArray[$value->id] = $value->title;
            }
            $query = News::find()
                ->leftJoin('news_category', '`news_category`.`news_id` = `news`.`id`')
                ->where(['category_id' => $CategorysArray]);

            $getCatsChild = Category::find()->where(['parent_id'=>$category->id])
                ->orderBy('category.id DESC')->all();
            $relatedCats = Category::find()->where(['parent_id'=>$category->parent_id])
                ->orderBy('category.id DESC')->all();


        }



        $list_cate = Category::find()->where(['link'=>$title])->andWhere(['type'=>'category'])->one();
        $this->description = $category->meta_description;
        if ($category->meta_seo) {
            $this->title = $category->meta_seo;
        } else {
            $this->title = $category->title;
        }
        $this->image= 'https://namhocsaigon.com'.$category->image_ad;
        $this->link = '/'.$category->link;

        if (isset($_GET['page']) && $_GET['page'] >= 1) {
            $this->index = "NOINDEX";
        }

        $this->breadcrumb[0]['id']=Yii::$app->params['url']['website'];
        $this->breadcrumb[0]['name']='Trang chủ';
        $this->breadcrumb[0]['image']='';
        $this->breadcrumb[1]['id']=Yii::$app->params['url']['website'].$category->link;
        $this->breadcrumb[1]['name']=$category->name;
        $this->breadcrumb[1]['image']='';

        $author = Author::find()
            ->select('author.*')
            ->where(['id' => $category->author_id])
            ->asArray()->one();
        $doctor = Author::find()
            ->select('author.*')
            ->where(['id' => $category->doctor_id])
            ->asArray()->one();

        if ($author){
            $this->author = 'https://namhocsaigon.com/author'.'/'.$author['link'];
        }

        $countQuery = clone $query;
//        $pages = new Pagination(['totalCount' => $countQuery->count()]);
//        $pages->pageSize = 10;
        $models = $query->orderBy('news.id DESC')
            ->limit(6)
            ->all();
        $getViews = $query->orderBy('news.views DESC')->limit(3)->all();
        return $this->render($this->mobile . 'index', [
            'models' => $models,
            'category' => $category,
            'list_cate' => $list_cate,
            'catsChild' => $getCatsChild,
            'relatedCats' =>  $relatedCats,
            'getViews'=> $getViews,
            'author'=>$author,
            'doctor'=>$doctor
        ]);
        //  }
    }
}