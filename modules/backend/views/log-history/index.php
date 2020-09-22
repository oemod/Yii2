<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log';
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

            <div class="panel-body">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'id_log',
                        // 'id_user',
                        [
                            'attribute' => 'id_user',
                            'value' => 'user.username',
                        ],
                        'page_url:url',
                        'action',
                        'ip_address',
                        [
                            'label' => 'Created_at',
                            'value' => function($data) {
                                return Yii::$app->formatter->asDate($data['created_at'], 'yyyy-MM-dd H:i:s');
                            }
                        ],
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'header' => 'Action',
//                'headerOptions' => ['width' => '80'],
//                'template' => '{delete}{link}',
//            ],
                        //['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>
            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->

