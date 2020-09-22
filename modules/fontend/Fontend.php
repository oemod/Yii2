<?php

namespace app\modules\fontend;
use Yii;
class Fontend extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\fontend\controllers';

    public function init()
    {
        parent::init();
        if (Yii::$app->params['devicedetect']['isMobile'] && !Yii::$app->params['devicedetect']['isTablet']) {
            $this->layout = 'mobile';
        }else{
            $this->layout = 'main';
        }

    }
}
