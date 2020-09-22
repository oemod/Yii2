<?php

namespace app\widgets\bottom;

use app\components\helpers\Cache;
use Yii;
use yii\base\Widget;

use  app\models\Menu;

class BottomWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $menuTV =array();
        $menuDV =array();
        $menuVG =array();
        $menuVH =array();
        $menuKT =array();
        $menuDT =array();
        $cache = Yii::$app->cache->get('menufontend=menufontend');
        if ($cache === false) {
            $menuArr = Menu::find()
                ->where(['active' => 1])->asArray()->all();
            $newArray= array();
            function menu($sourceArr, $pattern = 0, $lever = 1, &$resultArr)
            {
                if (isset($sourceArr)) {
                    foreach ($sourceArr as $key => $value) {
                        if ($value['parent_id'] == $pattern) {
                            $value['lever'] = $lever;
                            $value['name'] =  $value['name'];
                            $resultArr[] = $value;
                            $newPattern = $value['id'];
                            unset($sourceArr[$key]);
                            menu($sourceArr, $newPattern, $lever + 1, $resultArr);
                        }
                    }
                }
            }
            if (isset($menuArr))
                menu($menuArr, 0, 1, $newArray);
            Yii::$app->cache->set('menufontend=menufontend', $newArray, 86400);
            $menuArr = $newArray;
        } else {
            $menuArr = $cache;
        }
        foreach($menuArr as $value){
            if(Menu::POSITION_VG==$value['position']){
                $menuVG[]=$value;
            }
            if(Menu::POSITION_DV==$value['position']){
                $menuDV[]=$value;
            }
            if(Menu::POSITION_TV==$value['position']){
                $menuTV[]=$value;
            }
            if(Menu::POSITION_VH==$value['position']){
                $menuVH[]=$value;
            }
            if(Menu::POSITION_KT==$value['position']){
                $menuKT[]=$value;
            }
            if(Menu::POSITION_DT==$value['position']){
                $menuDT[]=$value;
            }
        }
        return $this->render('bottom', [
                'info' => Cache::setInfo(),
                'infoMaterial' => Cache::setInfoMaterial(),
                'menuTV'=>$menuTV,
                'menuDV'=>$menuDV,
                'menuVG'=>$menuVG,
                'menuVH'=>$menuVH,
                'menuKT'=>$menuKT,
                'menuDT'=>$menuDT,
            ]
        );
    }

}

