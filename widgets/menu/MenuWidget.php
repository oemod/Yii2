<?php

namespace app\widgets\menu;

use app\components\helpers\Cache;
use app\models\News;
use Yii;
use yii\base\Widget;
use app\models\Menu;


class MenuWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $menuArr=Cache::setMenu();
        return $this->render('menu', [
                'menu' => $menuArr,

            ]
        );
    }

}

