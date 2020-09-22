<?php

namespace app\modules\backend\controllers;
use app\components\rbac\Helper;
use Yii;
use app\models\LogHistory;
use yii\web\Controller;
use yii\di\Instance;
use yii\web\User;
use yii\web\ForbiddenHttpException;
class Controllers extends Controller {

   public function beforeAction($action) {
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
