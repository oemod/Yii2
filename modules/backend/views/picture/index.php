<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use  app\models\Picture;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PictureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pictures';
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
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => 'Image',
                            'format' => 'raw',  //Image($image,$width,$create)
                            'value' => function($data) {
                                $url =  $data['image'];
                                return Html::img($url, ['alt' => 'image']);
                            }
                        ],
                        [
                            'label' => 'Thời gian tạo',
                            'value' => function($data) {
                                return Yii::$app->formatter->asDate($data['created_at'], 'yyyy-MM-dd H:i:s');
                            }
                        ],
                        'Trạng thái' => [
                            'attribute' => 'postion',
                            'format' => 'raw',
                            'filter' => ['phòng khám', 'Thiết bị','Chứng chỉ'],
                            'filter' => array(
                                Picture::POSTION_PK => "Phòng khám",
                                Picture::POSTION_TB => "Thiết bị",
                                Picture::POSTION_CC => "Chứng chỉ"),
                            'value' => function($data) {
                                $array=array();
                                $array[Picture::POSTION_PK]= "Phòng khám";
                                $array[Picture::POSTION_TB]="Thiết bị";
                                $array[Picture::POSTION_CC]="Chứng chỉ";
                                return $array[$data['postion']];
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Action',
                            'headerOptions' => ['width' => '80'],
                            //'template' => '{delete}',
                        ],
                    ],
                ]); ?>
            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->