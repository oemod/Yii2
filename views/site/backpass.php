<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Lấy lại mật khẩu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-box" id="login-box">
    <div class="header"><?= Html::encode($this->title) ?></div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => ''],
        'action' =>'/site/backpass',
    ]); ?>
    <div class="body bg-gray">
        <div class="form-group">
            <?= $form->field($model, 'email') ?>

        </div>
        <div class="form-group">
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
            ]) ?>

        </div>
        <div class="form-group">

        </div>
    </div>
    <div class="footer">
        <?= Html::submitButton('Lấy lại mật khẩu', ['class' => 'btn bg-olive btn-block', 'name' => 'login-button']) ?>
        <a href="/site/login" class="text-center">Login</a>
    </div>
    <?php ActiveForm::end(); ?>
    <?php if (Yii::$app->get("authClientCollection", false)): ?>
        <div class="col-lg-offset-2">
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['site/auth'],
                'popupMode' => false,
            ]) ?>
        </div>
    <?php endif; ?>

</div>


