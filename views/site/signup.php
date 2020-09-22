1<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Sign up';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title)?></h1>
    <p><?=  Yii::t("app","Please fill out the follow")?></p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form= ActiveForm::begin(['id'=>'form-signup'])?>
            <fieldset><legend><?= Yii::t('app','User')?></legend>
                <?= $form->field($model,'username')?>
                <?= $form->field($model,'email')?>
                <?= $form->field($model,'password')->passwordInput()?>
                <?= $form->field($model,'password_repeat')->passwordInput()?>
            </fieldset>
            <div class="form-group">
                <?= Html::submitButton('Sign up',['class'=>'btn btn-primary','name'=>'signup-button']);?>
            </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>