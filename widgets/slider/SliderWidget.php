<?php

namespace app\widgets\slider;

use app\components\helpers\Cache;
use app\models\News;
use Yii;
use yii\base\Widget;
use app\models\Slides;


class SliderWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public $display;
    public function run()
    {
        return $this->render('slider', [
                'slider' => Cache::setSliderShow(),
                'display' => $this->display
            ]
        );
    }

}

