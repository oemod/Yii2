<?php

namespace app\controllers;

use app\components\helpers\UploadImage;
use app\models\BackpassForm;
use app\models\Messages;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Auth;
use app\models\User;
use app\components\helpers\Facebook;
use yii\helpers\Json;

class SearchController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex(){
        $ch = curl_init();
        $a=array();
        $a['message']="34depzai quang";
        $params= json_encode($a);

        curl_setopt($ch, CURLOPT_URL, 'http://localhost:9200/twitter/tweet/9');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        die;
    }

    public function actionMappings(){
        $ch = curl_init();
        $a=array();
        $params= '{
                    "mappings": {
                       "tweet1": {
                         "properties": {
                             "message1": {
                                "type": "string"
                              }
                          }
                       }
                      }
                  }';
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:9200/twitter');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        die;
    }

    public function actionSearch(){
        $url = "http://localhost:9200/twitter/tweet/_search";
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL, $url);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
        $avatar = curl_exec($ch1);
        curl_close($ch1);
      echo '<pre>'; print_r(json_decode($avatar));die;
        die;
    }

    public function actionDelete(){
        $url = "http://localhost:9200/twitter/tweet/3?pretty";
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL, $url);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
        $avatar = curl_exec($ch1);
        curl_close($ch1);
        echo '<pre>'; print_r(json_decode($avatar));die;
        die;
    }



    public function actionQuery(){
        $ch = curl_init();
        $params=array();

        $params["query"]=[
            "match"=>[
                "message"=>"quang"
            ]
        ];
        $params["sort"]=[
            "message"=>[
                "order"=>"desc"
            ]
        ];
        $params=json_encode($params);

       /* $params= '{
              "query" : {
                "match" : {
                  "message" : "quang"
                }
              },
              "sort" : {
                "message" : {
                  "order" : "desc"
                }
              }
            }';*/
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:9200/twitter/tweet/_search');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        print_r($result);die;
        die;
    }


}
