<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\models\News;
use app\components\helpers\UploadImage;
use app\models\NewsCategory;
use app\models\Category;
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
                            'attribute' => 'post_title',
                            'label' => 'Tên Tiêu Đề',
                            'format' => 'raw',
                            'value' => function ($data) {
                                $url = "/backend/news/update?id=" . $data['id'];
                                return Html::a($data['post_title'], $url, ['post_title' => $data['id']]);
                            }
                        ],
                        [
                            'attribute'=>'category_id',
                            'value' => function ($data) {
                                $category_id =  $data['category_id'];
                                $category = Category::find()->where(['id'=>$category_id])->one();
                                return $category['name'];
                            }
                        ],
                        [
                            'attribute'=>'post_author',
                            'value'=>'user.username',
                        ],
                        'views',
                        [
                            'label' => 'Image',
                            'format' => 'raw',  //Image($image,$width,$create)
                            'value' => function ($data) {
                                $url = Yii::getAlias('@web') . UploadImage::Image('news', $data['image'], 50, $data['created_at']);
                                return Html::img($url, ['alt' => 'image']);
                            }
                        ],
                        [
                            'label' => 'Thời gian tạo',
                            'value' => function ($data) {
                                return Yii::$app->formatter->asDatetime($data['created_at'], 'yyyy-MM-dd H:i:s');
                            }
                        ],
                        [
                            'attribute' => 'update_at',
                            'label' => 'Xem trước',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a('Xem trước', '/' . $data['post_name'], ['title' => $data['id']]);
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Delete',
                            'headerOptions' => ['width' => '10'],
                            'template' => '{delete}'
                        ],

                    ],

                ]); ?>
            </div>
        </div>
    </div>
</div>













