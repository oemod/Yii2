<?php

namespace app\widgets\footer;

use app\components\helpers\Cache;
use app\models\News;
use Yii;
use yii\base\Widget;
use app\models\Menu;


class FooterWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('footer', [
                'menu' => Cache::setMenuMobile(),

            ]
        );
    }

}

