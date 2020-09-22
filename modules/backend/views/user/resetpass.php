<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\UserWidget;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12">
    <?= UserWidget::widget(['user_id' => Yii::$app->user->id]); ?>

</div>

<?php
$form = ActiveForm::begin(['options' =>
            [
                'enctype' => 'multipart/form-data',
                'action' => '/user/resetpass',
            ]
        ]);
?>
<div class="col-xs-12 content">
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                <div class="form-group-sm  col-sm-12">
                    <div class="form-group-sm col-xs-6">
                         <?= $form->field($model,'password_hash')->passwordInput()?>
                    </div>
                    <div class="form-group-sm col-xs-6">
                       <?= $form->field($model,'password_repeat')->passwordInput()?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer text-right">
            <div class="btn-group-xs">

                <button type="submit" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
