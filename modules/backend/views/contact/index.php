<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\models\Contact;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
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
                            'attribute' => 'name',
                            'label' => 'HỌ TÊN',
                            'format' => 'raw',
                            'value' => function($data) {
                                $url = "/backend/contact/view?id=" . $data['id'];
                                return Html::a($data['name'], $url, ['title' => $data['id']]);
                            }
                        ],
                        'phone',
                        'email:email',
                        'Trạng thái' => [
                            'attribute' => 'active',
                            'format' => 'raw',
                            'filter' => ['Hoạt động', 'Đã Khoá'],
                            'filter' => array(Contact::STATUS_ACTIVE => "Đã liên hệ", Contact::STATUS_LOCK => "Chưa liên hệ"),
                            'value' => function($data) {
                                $array=array();
                                $array[Contact::STATUS_ACTIVE ]="Đã liên hệ";
                                $array[Contact::STATUS_LOCK ]="Chưa liên hệ";
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
                            'template' => '{delete},{view}',
                        ],
                    ],
                ]); ?>

            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->

