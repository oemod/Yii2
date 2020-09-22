<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emails';
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
                <?= Html::a('Tạo Email', ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Gửi Email', ['send'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Emport Email', ['send'], ['class' => 'btn btn-success']) ?>


                    <div class="fileupload fileupload-new btn btn-success" data-provides="fileupload"><input type="hidden" value="" name="">
                                <span class="btn btn-file">
                                    <span class="fileupload-new">Import Excel</span>

                                    <input type="file" name="">
                                </span>
                        <span class="fileupload-preview"></span>
                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                    </div>


            </div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'email:email',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            </div>
        </div>
    </div>


<style>
    .btn-file {
        color: #ffffff;
        background-color: #259dab;
        border-color: transparent;
    }
    .btn-file>input {
        top: 0;
        right: 0;
        margin: 0;
        width: 65px;
        opacity: 0;
    }
</style>