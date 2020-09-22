<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogHistory */

$this->title = 'Update Log History: ' . ' ' . $model->id_log;
$this->params['breadcrumbs'][] = ['label' => 'Log Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_log, 'url' => ['view', 'id' => $model->id_log]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="log-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
