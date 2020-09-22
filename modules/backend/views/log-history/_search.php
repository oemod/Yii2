<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LogHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_log') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'page_accessed') ?>

    <?= $form->field($model, 'page_url') ?>

    <?php // echo $form->field($model, 'action') ?>

    <?php // echo $form->field($model, 'ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
