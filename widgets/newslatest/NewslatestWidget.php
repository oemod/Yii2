<?php

namespace app\widgets\newslatest;

use app\components\helpers\Cache;
use app\models\News;
use Yii;
use yii\base\Widget;

use  app\models\Menu;

class NewslatestWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public $id;

    public function run()
    {
        return $this->render('newslatest', [
                'latestNews'=>Cache::getLatestNews()                
            ]
        );
    }

}

