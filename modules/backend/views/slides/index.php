<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\components\helpers\UploadImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlidesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slides';
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

                        //  'id',
                        // 'name',
                        [
                            'attribute' => 'name',
                            'label' => 'name',
                            'format' => 'raw',
                            'value' => function($data) {
                                $url = "/backend/slides/update?id=" . $data['id'];
                                return Html::a($data['name'], $url, ['title' => $data['id']]);
                            }
                        ],
                        'link',
                        /*'Mobile' => [
                            'attribute' => 'mobile',
                            'format' => 'raw',
                            'filter' => ['mobile', 'pc','home'],
                            'filter' => array(\app\models\Slides::STATUS_MOBILE => "Mobile", \app\models\Slides::STATUS_PC => "PC",\app\models\Slides::STATUS_HOME => "Home"),
                            'value' => function($data) {
                                $array=array();
                                $array[\app\models\Slides::STATUS_MOBILE]="Mobile";
                                $array[\app\models\Slides::STATUS_PC ]="PC";
                                $array[\app\models\Slides::STATUS_HOME ]="Home";
                                return $array[$data['mobile']];
                            }
                        ],*/
                        'image',
                        [
                            'label' => 'Created_at',
                            'value' => function($data) {
                                return Yii::$app->formatter->asDate($data['created_at'], 'yyyy-MM-dd H:i:s');
                            }
                        ],
                        // 'updated_at',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->

