<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



        <div class="form-group-sm">
            <label for="image">Avartar (*)</label>
            <div class="input-group input-group-sm">
                <?= $form->field($model, 'image')->textInput(['maxlength' => true])->label(false)  ?>
                <span class="input-group-btn">
                <button class="btn btn-default btn-flat" type="button" onclick="getImage();"><i
                        class="fa fa-upload"></i></button>
            </span>
            </div>
        </div>

    <?= $form->field($model, 'order')->textInput() ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'active')->dropDownList([\app\models\Feedback::STATUS_ACTIVE => 'Hoạt động', \app\models\Feedback::STATUS_LOCK => 'Khoá']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script language="javascript" src="/ckfinder/ckfinder.js" type="text/javascript"></script>
<script type="text/javascript">
    function getImage() {
        var finder = new CKFinder();
        finder.selectActionFunction = setImageField;
        finder.popup();
    }

    function setImageField(fileUrl) {
        document.getElementById('feedback-image').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }

</script>
