<?php

namespace app\modules\fontend\controllers;

use app\components\helpers\Cache;
use Yii;
use app\models\Config;
use yii\web\Controller;
use app\models\LogHistory;
class Controllers extends Controller {
    public $description;
    public $title;
    public $keywords;
    public $logo;
    public $address;
    public $favicon;
    public $hotline;
    public $link;
    public $mobile;
    public $email;
    public $website;
    public $app_id;
    public $author;
    public $slogan;
    public $video;
    public $js;
    public $logo_mobile;
    public $index;
    public $image;
    public $policy;
    public $created_at;
    public $updated_at;
    public $procedure_home;
    public $menu;
    public $link_chat;
    public $breadcrumb;
    public function beforeAction($action) {

        $config = Cache::setConfig();
        $this->description=$config['meta_description'];
        $this->title=$config['title'];
        $this->keywords=$config['meta_keywords'];
        $this->logo=$config['logo'];
        $this->address=$config['address'];
        $this->favicon=$config['favicon'];
        $this->hotline=$config['hotline'];
        $this->email=$config['email'];
        //$this->created_at=$config['created_at'];
     //   $this->updated_at=$config['updated_at'];
        $this->website=$config['website'];
        $this->app_id=$config['app_id'];
        $this->author=$config['author'];
        $this->slogan=$config['slogan'];
        $this->logo_mobile=$config['logo_mobile'];
        $this->link='/';
        $this->policy=$config['policy'];
        $this->procedure_home=$config['procedure_home'];
        $this->image=isset($config['image'])?Yii::$app->params['url']['website'] .$config['image']:Yii::$app->params['url']['website'] .$config['logo'];
        $this->index='';
        $this->menu=Cache::getMenu();
        $this->js=$config['js'];
        $this->link_chat = $config['link_chat'];
        Yii::$app->params['logo']=$config['logo'];
        Yii::$app->params['address']=$config['address'];


//        die;
        if (Yii::$app->params['devicedetect']['isMobile'] && !Yii::$app->params['devicedetect']['isTablet']) {
            $this->mobile = 'mobile/';
        }else{
            $this->mobile = '';
        }
        $breadcrumb=array();
        $this->breadcrumb[0]['id']=Yii::$app->params['url']['website'];
        $this->breadcrumb[0]['name']='Trang chủ';
        $this->breadcrumb[0]['image']='';

  $model = new LogHistory();
        $model->id_user=Yii::$app->user->id;
        $model->action=Yii::$app->controller->action->id;       
        $model->page_url = Yii::$app->getRequest()->getUrl();
        $model->ip_address=Yii::$app->request->userIP;
       $model->ip_address=Yii::$app->request->userIP;


        $model->save(FALSE);
		
		
        return parent::beforeAction($action);
    }

}
