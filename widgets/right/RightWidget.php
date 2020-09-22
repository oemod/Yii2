<?php

namespace app\widgets\right;

use app\components\helpers\Cache;
use app\models\Category;
use Yii;
use yii\base\Widget;

use  app\models\Menu;

class RightWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('right', [
                'views'=>Cache::getViewNews(),
            ]
        );
    }

}

