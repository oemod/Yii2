<?php

namespace app\widgets\header;

use app\components\helpers\Cache;
use app\models\News;
use Yii;
use yii\base\Widget;
use app\models\Menu;


class HeaderWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('header', [
                'menu' => Cache::setMenuPc(),

            ]
        );
    }

}

