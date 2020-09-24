<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configs';
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
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'site_name',
                            'label' => 'Tên Page',
                            'format' => 'raw',
                            'value' => function($data) {
                                $url = "/backend/config/update?id=" . $data['id'];
                                return Html::a($data['site_name'], $url, ['name' => $data['id']]);
                            }
                        ],
                        'title',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->
