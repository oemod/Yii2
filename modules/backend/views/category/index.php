<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\models\News;
use app\components\helpers\UploadImage;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chuyên Mục';
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
                            'label' => 'Tên Chuyên Mục',
                            'format' => 'raw',
                            'value' => function($data) {
                                $url = "/backend/category/update?id=" . $data['id'];
                                return Html::a($data['name'], $url, ['name' => $data['id']]);
                            }
                        ],
                        'link',
                        //'order',
                        'title',
                        // 'meta_seo',
                        // 'meta_description',
                        // 'description',
                        // 'link',
                        // 'postion',
                        //
                        // 'type',
                        //'parent_id',
                        // 'count',
                        //'active',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            

            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->













