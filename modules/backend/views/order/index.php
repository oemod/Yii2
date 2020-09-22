
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\models\Menu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đặt hẹn';
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
                        'benh',
                        'phone',
                        'site',
                         'name',
                        'ip',
                        [
                            'label' => 'Thời gian tạo',
                            'value' => function($data) {
                                return Yii::$app->formatter->asDate($data['created_at'], 'yyyy-MM-dd H:i:s');
                            }
                        ],
                        'position',
                        'Trạng thái' => [
                            'attribute' => 'active',
                            'format' => 'raw',
                            'filter' => ['Đã Check', 'Chưa Check'],
                            'filter' => array(Menu::STATUS_ACTIVE => "Đã Check", Menu::STATUS_LOCK => "Chưa Check"),
                            'value' => function($data) {
                                $array=array();
                                $array[Menu::STATUS_ACTIVE ]="Đã Check";
                                $array[Menu::STATUS_LOCK ]="Chưa Check";
                                return $array[$data['active']];
                            }
                        ],
                        [
                            'label' => 'Thời gian tạo',
                            'value' => function($data) {
                                return Yii::$app->formatter->asDate($data['created_at'], 'yyyy-MM-dd H:i:s');
                            }
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>



            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->

