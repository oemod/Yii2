<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\models\Menu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="mainpanel">
    <div class="contentpanel">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>

        <div class="panel">
            <div class="panel-heading">
                <p><?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?> </p>
            </div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'name',
                            'label' => 'TÊN MENU',
                            'format' => 'raw',
                            'value' => function($data) {
                                $url = "/backend/menu/update?id=" . $data['id'];
                                return Html::a($data['name'], $url, ['title' => $data['id']]);
                            }
                        ],
                        'metakeywords',
                        'order',
                        'Trạng thái' => [
                            'attribute' => 'active',
                            'format' => 'raw',
                            'filter' => ['Hoạt động', 'Đã Khoá'],
                            'filter' => array(Menu::STATUS_ACTIVE => "Hoạt động", Menu::STATUS_LOCK => "Đã Khoá"),
                            'value' => function($data) {
                                $array=array();
                                $array[Menu::STATUS_ACTIVE ]="Hoạt động";
                                $array[Menu::STATUS_LOCK ]="Đã Khoá";
                                return $array[$data['active']];
                            }
                        ],
                        [
                            'label' => 'Thời gian tạo',
                            'value' => function($data) {
                                return Yii::$app->formatter->asDate($data['created_at'], 'yyyy-MM-dd H:i:s');
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Action',
                            'headerOptions' => ['width' => '80'],
                            'template' => '{delete}',
                        ],
                    ],
                ]); ?>



            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->

