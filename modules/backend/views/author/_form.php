<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Author */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="author-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'type')->dropDownList([\app\models\Author::STATUS_ACTIVE => 'Biên tập viên', \app\models\Author::STATUS_LOCK => 'Bác sĩ']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'active')->dropDownList([\app\models\Author::STATUS_ACTIVE => 'Hoạt động', \app\models\Author::STATUS_LOCK => 'Khoá']) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-lg-4">
            <label for="image">Ảnh đại diện</label>
            <div class="input-group input-group-sm">
                <?= $form->field($model, 'image')->textInput(['maxlength' => true])->label(FALSE) ?>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-flat" type="button" onclick="getImage();"><i
                                class="fa fa-upload"></i></button>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'facebook_page')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'google')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-12">
            <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-12 form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Thêm mới') : Yii::t('app', 'Cập nhập'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script language="javascript" src="/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">CKEDITOR.replace('author-description');</script>

<script language="javascript" src="/ckfinder/ckfinder.js" type="text/javascript"></script>
<script type="text/javascript">
    function getImage() {
        var finder = new CKFinder();
        finder.selectActionFunction = setImageField;
        finder.popup();
    }
    function setImageField(fileUrl) {
        document.getElementById('author-image').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }
</script>


