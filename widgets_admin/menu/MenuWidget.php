<?php

namespace app\widgets_admin\menu;

use app\models\User;
use Yii;
use yii\base\Widget;


class MenuWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $user=User::find()->all();
        return $this->render('menu', [
                'user'=>$user,
            ]
        );
    }

}

