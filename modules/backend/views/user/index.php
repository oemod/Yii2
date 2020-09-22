<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;
use app\components\helpers\UploadImage;
use app\models\User;
$this->title = 'Thành viên';
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
                <?php
                $gridColumns = [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'username',
                        'label' => 'username',
                        'format' => 'raw',
                        'value' => function($data) {
                            $url = "/backend/user/update?id=" . $data['id'];
                            return Html::a($data['username'], $url, ['title' => $data['id']]);
                        }
                    ],
                    'email:email',


                    'Trạng thái' => [
                        'attribute' => 'status',
                        'filter' => ['Hoạt động', 'Đã Khoá', 'Đã xoá'],
                        'filter' => array(User::STATUS_ACTIVE => "Hoạt động", User::STATUS_LOCK => "Đã Khoá", User::STATUS_DELETED => "Đã Xoá"),
                        'value' => function($data) {
                            $array=array();
                            $array[User::STATUS_ACTIVE ]="Hoạt động";
                            $array[User::STATUS_LOCK ]="Đã Khoá";
                            $array[User::STATUS_DELETED]="Đã Xoá";
                            return $array[$data['status']];
                        }
                    ],
                    [
                        'label' => 'Created_at',
                        'value' => function($data) {
                            return Yii::$app->formatter->asDate($data['created_at'], 'yyyy-MM-dd H:i:s');
                        }
                    ],
                    /*[
                        'label' => 'Avatar',
                        'format' => 'raw',
                        'value' => function($data) {
                            $url = Yii::getAlias('@web') .  UploadImage::GetAvatarThubm($data['avatar'],$data['created_at'],50);  // '/upload/image/avatar/40x40/' . $data['avatar'];
                            return Html::img($url, ['alt' => 'avatar']);
                        }
                    ],*/
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Action',
                        'headerOptions' => ['width' => '80'],
                        'template' => '{delete},{assignment}',
                        'buttons' => [
                            'assignment' => function ($url) {
                                return Html::a('<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>',$url);
                            },
                        ],

                    ],
                ];
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $gridColumns,
                    'filterModel' => $searchModel,
                ]);
                ?>
            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->
