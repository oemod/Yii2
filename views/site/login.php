<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Đăng Nhập';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sign-overlay"></div>
<div class="signpanel"></div>

<div class="panel signin">
    <div class="panel-heading">
        <h1>ADMIN</h1>
        <h4 class="panel-title">Welcome! Please signin.</h4>
    </div>
    <div class="panel-body">
        <button class="btn btn-primary btn-quirk btn-fb btn-block">Connect with Facebook</button>
        <div class="or">or</div>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => ''],
//        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//        ],
        ]); ?>
           <!-- <div class="form-group mb10">
                <div class="input-group">-->
                   <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                    <?= $form->field($model, 'username')?>
               <!-- </div>
            </div>-->
            <div class="form-group nomargin">
               <!-- <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="text" class="form-control" placeholder="Enter Password">
                </div>-->
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
        <?= $form->field($model, 'rememberMe', [
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->checkbox() ?>
            <div><a href="#" class="forgot">Forgot password?</a></div>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-quirk btn-block', 'name' => 'login-button']) ?>
            </div>
        <?php ActiveForm::end(); ?>
        <hr class="invisible">
        <div class="form-group">
            <a href="signup.html" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Not a member? Sign up now!</a>
        </div>
    </div>
</div><!-- panel -->


