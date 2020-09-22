<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'active')->dropDownList([\app\models\Category::STATUS_ACTIVE => 'Đã Check', \app\models\Category::STATUS_LOCK => 'Chưa Check']) ?>
        </div>

    </div>
    <div class="col-lg-12">
        <div class="col-lg-12">
            <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
        </div>

    </div>

    <div class="col-lg-12">
        <div class="col-lg-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Thêm Mới' : 'Cập Nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>

    </div>


    <?php ActiveForm::end(); ?>

</div>
