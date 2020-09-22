
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\models\Tags;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tags';
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
                            'attribute' => 'tag_name',
                            'label' => 'TAGS NAME',
                            'format' => 'raw',
                            'value' => function($data) {
                                $url = "/backend/tags/update?id=" . $data['id'];
                                return Html::a($data['tag_name'], $url, ['title' => $data['id']]);
                            }
                        ],

                        'meta_title',
                        'meta_description',
                        'meta_keywords',


                        'Trạng thái' => [
                            'attribute' => 'active',
                            'format' => 'raw',
                            'filter' => ['Hoạt động', 'Đã Khoá'],
                            'filter' => array(Tags::STATUS_ACTIVE => "Hoạt động", Tags::STATUS_LOCK => "Đã Khoá"),
                            'value' => function($data) {
                                $array=array();
                                $array[Tags::STATUS_ACTIVE ]="Hoạt động";
                                $array[Tags::STATUS_LOCK ]="Đã Khoá";
                                return $array[$data['active']];
                            }
                        ],
                        [
                            'label' => 'Thời gian tạo',
                            'format' => 'raw',
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


