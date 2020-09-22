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
use app\models\NewsCategory;
use app\models\Author;
use app\models\NewTag;
use app\models\Order;
use app\components\helpers\HelperLink;
use app\models\Follow;
use Yii;
use yii\db\Exception;
use app\components\helpers\SessionHelper;
use app\models\Category;
use app\models\Product;
use app\models\User;
use app\components\helpers\LocationHelper;
use app\modules\fontend\controllers\Controllers;
use yii\data\Pagination;


class DetailController extends Controllers {

    public function init() {
        parent::init();
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionEditTitle() {
        $news = News::find()->all();
        foreach ($news as $model) {

            $model->content = $this->Edit($model->content);
            $model->save(false);
        }
    }

    
    public function actionUrl() {
        $url = News::find()->all();
        foreach ($url as $model) {
            $model->link = HelperLink::rewriteUrl($model->id, $model->title, Yii::$app->params['url']['detail']);
            $model->save(false);
        }
        die;
    }

    public function actionIndex($title) {

//        die;

        header("Content-Type: text/plain; charset=utf-8");
       $arr= explode(".",$title);
        if(isset($arr[1])){
            return $this->redirect('https://namhocsaigon.com/'.$arr[0]);
        }

        $model = News::find()->where(['post_name' => $title])->one();

        if(!empty($model)){

            if ($model->meta_description) {
                $this->description = $model->meta_description;
            } else {
                $this->description = $model->post_title;
            }
            if ($model->meta_keyword) {
                $this->keywords = $model->meta_keyword;
            } else {
                $this->keywords = $model->post_title;
            }
            if ($model->meta_titile) {
                $this->title = $model->meta_titile;
            } else {
                $this->title = $model->post_title;
            }
            if ($model->ping_status == 'publish') {
                $this->index = 'index';
            } else {
                $this->index = 'noindex';
            }
            $url= $_SERVER['REQUEST_URI'];
            $page = explode("?",$url);
            if(isset($page[1])){
                $this->index = 'noindex';
            }

            $this->link = '/'.$model->post_name;
            $this->created_at = $model->created_at;
            $this->updated_at = $model->updated_at;
            $date = Yii::$app->formatter->asDate($model->created_at, 'yyyy/MM/dd');
            $this->image = 'https://namhocsaigon.com/upload/news/'.$date.'/'.$model->image ;
            $model->views = $model->views + 1;
            $model->save(false);
//            print_r($model);die;
            $category = NewsCategory::find()
                ->select('category.name,category.link,category.id,category.parent_id')
            ->innerJoin('category', '`category`.`id` = `news_category`.`category_id`')
            ->where(['news_category.news_id' => $model->id])->asArray()->one();

            $parent =Category::find()->where(['id'=>$category['parent_id']])->one();

            $query = NewsCategory::find()
                ->select('news.*')
            ->innerJoin('news', '`news`.`id` = `news_category`.`news_id`')
            ->where(['news_category.category_id' => $category['id']])
            ->andWhere(['not in','news.id',$model->id])->orderBy('id desc');

            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 6]);
            $newscategory = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();

            $author = Author::find()
                ->select('author.*')
                ->where(['id' => $model->author_id])
                ->asArray()->one();
            $doctor = Author::find()
                ->select('author.*')
                ->where(['id' => $model->doctor_id])
                ->asArray()->one();

            if(!isset($newscategory )){
                return $this->redirect('/site/404');
            }

            if ($author){
                $this->author = 'https://namhocsaigon.com/author'.'/'.$author['link'];
            }

            $this->breadcrumb[0]['id']=Yii::$app->params['url']['website'];
            $this->breadcrumb[0]['name']='Trang chủ';
            $this->breadcrumb[0]['image']='';
            $this->breadcrumb[1]['id']=Yii::$app->params['url']['website'].$category['link'];
            $this->breadcrumb[1]['name']=$category['name'];
            $this->breadcrumb[1]['image']='';
            $this->breadcrumb[2]['id']=Yii::$app->params['url']['website'].$model->post_name;
            $this->breadcrumb[2]['name']=$model->post_title;
            $this->breadcrumb[2]['image']='';
            return $this->render($this->mobile . 'index', [
                'category' => $category,
                'model' => $model,
                'parent'=>$parent,
                'newscategory' => $newscategory,
                'author'=>$author,
                'doctor'=>$doctor,
                'pages'=>$pages
                ]);
        }
        else{
          return  $this->redirectcategory($title);
        }
    }

    public function actionIntroduce() {
        $this->title = "Bệnh viện Nam học Sài Gòn: Địa chỉ khám chữa Nam khoa hàng đầu TP.HCM";
        $this->description= "Bệnh viện Nam học Sài Gòn 495 Cộng Hòa, Tân Bình là một trong những Phòng khám Nam khoa uy tín - chất lượng hàng dầu Thành phố Chí Minh, là điểm đến tin cậy của các quý ông khi gặp các vấn đề yếu sinh lý, xuất tinh sớm, dài hẹp bao quy đầu, ... hay các bệnh xã hội.";
        $this->keywords = "Giới thiệu Bệnh viện Nam học Sài Gòn";
        $news = Config::find()->one();
        $this->link = "/gioi-thieu";
        $this->image = "/images/files/40x40.png";
        return $this->render($this->mobile . 'introduce', [
            'news' => $news,
            ]);
    }

    public function actionContact() {
        $this->title = "Liên hệ Bệnh viện Nam học Sài Gòn";
        $this->description= "Bệnh viện Nam học Sài Gòn tọa lạc tại vị trí đắc địa 495 Cộng Hòa, Phường 15, Quận Tân Bình, TP. Hồ Chí Minh. Gọi điện ngay hotline: 0396757702 để đặt lịch hẹn trước và tư vấn hoàn toàn miễn phí.";
        $this->keywords="Liên hệ Bệnh viện Nam học Sài Gòn";
        $news = Config::find()->one();
        $this->link = "/lien-he";
        $this->image = "/images/files/40x40.png";
        return $this->render($this->mobile . 'contact', [
            'news' => $news,
            ]);
    }


    public function actionPolicy() {
        $news = Config::find()->one();
        return $this->render($this->mobile . 'policy', [
            'news' => $news,
            ]);
    }

    public function actionGuide() {
        $news = Config::find()->one();
        return $this->render($this->mobile . 'guide', [
            'news' => $news,
            ]);
    }

    public function actionProcedure() {
        $news = Config::find()->one();

        return $this->render($this->mobile . 'procedure', [
            'news' => $news,
            'view' => Cache::setView(),
            ]);
    }

    public function actionDangKi() {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post())) {
            $model->active = Contact::STATUS_ACTIVE;
            $model->save(false);
        }

        $this->goHome();
    }

    public function actionLoadmore() {
        $page = $_POST['page'];
        $title = $_POST['title'];
        $title2 = HelperLink::rewriteNews($title);
        $title2 = substr($title2, 1);
        $model = News::find()->where(['post_name' => $title2])->one();

        $category = NewsCategory::find()->select('category.name,category.link,category.id,category.parent_id')
        ->innerJoin('category', '`category`.`id` = `news_category`.`category_id`')
        ->where(['news_category.news_id' => $model->id])->asArray()->one();

        //   $newscategory = News::find()->where(['root_category' => 811])->limit(6)->offset($page * 6)->orderBy('created_at DESC')->all();
        $newscategory = NewsCategory::find()->select('news.*')
        ->innerJoin('news', '`news`.`id` = `news_category`.`news_id`')
        ->where(['news_category.category_id' => $category['id']])->orderBy(['id' => SORT_DESC])->limit(6)->offset($page * 6)->asArray()->all();
        return $this->renderAjax('loadmore', [
            'newscategory' => $newscategory,
            ]);
        die;
    }


    public function redirectCategory($category){

//         die;
        $root = Category:: find()->where(['link'=>$category])->asArray()->one();
//        print_r($root["title"]);die;
        if ($root["description"]) {
            $this->description = $root["description"];
        } else {
            $this->description = $root["title"];
        }
        $this->link = '/'.$root['link'];
        $this->title = $root["title"];
        if(isset($_GET['page']) && $_GET['page']==1){
            return $this->redirect('https://namhocsaigon.com/'.$root['link']);
        }
//        print_r($root["title"]);die;
        if(isset($_GET['page']) && $_GET['page'] > 1){
            $this->description = $root["description"].' Trang ='. $_GET['page'];
            $this->title = $root["title"].' Trang '. $_GET['page'];
            $this->link = '/'.$root['link'].'?page='.$_GET['page'];
        }

        if ($root["meta_seo"]) {
            $this->keywords = $root["meta_seo"];
        } else {
            $this->keywords = $root["title"];
        }

		
		if($category=='tin-tuc'){
			 $query =  NewsCategory::find()->select('news.*')
				->innerJoin('news', '`news`.`id` = `news_category`.`news_id`')
				->where(['news_category.category_id'=>66]);
			  
			  $countQuery = clone $query;
				$pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 10]);
				$models = $query->offset($pages->offset)
				->limit($pages->limit)->asArray()->orderBy('id desc')
				->all();

//				print_r($models);die;


//        print_r($root['link']);die;

        $this->image = $root['image_ad'];
				
		$this->breadcrumb[0]['id']=Yii::$app->params['url']['website'];
        $this->breadcrumb[0]['name']='Trang chủ';
        $this->breadcrumb[0]['image']='';
        $this->breadcrumb[1]['id']=Yii::$app->params['url']['website'].$root['link'];
        $this->breadcrumb[1]['name']=$root['name'];
        $this->breadcrumb[1]['image']='';

            if(!isset($root)){
                return $this->redirect('/site/404');
            }

        return $this->render($this->mobile .'tin-tuc', [
            'models' => $models,
            'pages' => $pages,
            'root'=>$root,
            ]);
				
		}else{

		    $query = Category::find()->where(['parent_id'=>$root['id']]);
		    $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 10]);
        $models = $query->offset($pages->offset)
        ->limit($pages->limit)->orderBy('id desc')
        ->all();
		}
		
	//
        $this->image = $root['image_ad'];
//			 print_r($root);die;

        $this->breadcrumb[0]['id']=Yii::$app->params['url']['website'];
        $this->breadcrumb[0]['name']='Trang chủ';
        $this->breadcrumb[0]['image']='';
        $this->breadcrumb[1]['id']=Yii::$app->params['url']['website'].$root['link'];
        $this->breadcrumb[1]['name']=$root['name'];
        $this->breadcrumb[1]['image']='';

        if(!isset($root)){
            return $this->redirect('/site/404');
        }
        return $this->render($this->mobile .'category', [
            'models' => $models,
            'pages' => $pages,
            'root'=>$root,
            ]);

    }

}
