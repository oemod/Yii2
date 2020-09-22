<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LogHistory */

$this->title = $model->id_log;
$this->params['breadcrumbs'][] = ['label' => 'Log Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_log], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_log], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_log',
            'created_at',
            'id_user',
            'page_accessed',
            'page_url:url',
            'action',
            'ip_address',
        ],
    ]) ?>

</div>
