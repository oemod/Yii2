<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\models\Author;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tác giả');
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
                            'label' => 'Tên Tác Giả',
                            'format' => 'raw',
                            'value' => function($data) {
                                $url = "/backend/author/update?id=" . $data['id'];
                                return Html::a($data['name'], $url, ['name' => $data['id']]);
                            }
                        ],
                        'email:email',
                        'Thể loại' => [

                            'attribute' => 'type',

                            'format' => 'raw',

                            'filter' => array(Author::STATUS_ACTIVE => "Biên tập viên", Author::STATUS_LOCK => "Bác sĩ"),

                            'value' => function($data) {

                                $array=array();

                                $array[Author::STATUS_ACTIVE ]="Biên tập viên";

                                $array[Author::STATUS_LOCK ]="Bác sĩ";


                                return $array[$data['type']];

                            }

                        ],
                        [
                            'attribute' => 'update_at',
                            'label' => 'Xem trước',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a('Xem trước', '/author/' . $data['link'], ['title' => $data['id']]);
                            }
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->
