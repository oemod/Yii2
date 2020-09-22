<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\rbac\RouteRule;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>

<div class="auth-item-form">
    <?php $form = ActiveForm::begin(['id'=>'item-form']); ?>
    <div class="row">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
            <?= $form->field($model, 'ruleName')->dropDownList($rules, ['prompt' => ' --select rule']) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
            <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    </div>
    <div class="form-group">
        <?php
        echo Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name' => 'submit-button'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
