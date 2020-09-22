<?php

namespace app\widgets\sidebar;

use app\components\helpers\Cache;
use app\models\Category;
use app\models\News;
use Yii;
use yii\base\Widget;
use app\models\Menu;


class SidebarWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public $id;
    public $parent_id;
    public function run()
    {
        $query = Category::find()->orderBy(['rand()' => SORT_DESC])->limit(10)->all();

        $namkhoa =Category::find()->where(['parent_id' => 2])->orderBy(['rand()' => SORT_DESC])->limit(10)->all();
        $benhxahoi =Category::find()->where(['parent_id' => 1])->orderBy(['rand()' => SORT_DESC])->limit(10)->all();

        return $this->render('sidebar', [
                'models' => $query,
                'active'=>$this->id,
                'parent_id'=>$this->parent_id,
                'latestNews'=>Cache::getLatestNews(),
                'viewNews' => Cache::getViewNews(),
                'namkhoa'=> $namkhoa,
                'benhxahoi'=> $benhxahoi,
            ]
        );
    }

}

