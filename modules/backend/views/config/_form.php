<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'hotline')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'site_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'app_id')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <div class="form-group-sm">
                <label for="image">Logo (*)</label>

                <div class="input-group input-group-sm">
                    <?= $form->field($model, 'logo')->textInput(['maxlength' => true])->label(FALSE) ?>
                    <span class="input-group-btn">
                <button class="btn btn-default btn-flat" type="button" onclick="getImage();"><i
                        class="fa fa-upload"></i></button>
            </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group-sm">
                <label for="image">Favicon (*)</label>

                <div class="input-group input-group-sm">
                    <?= $form->field($model, 'favicon')->textInput(['maxlength' => true])->label(FALSE) ?>
                    <span class="input-group-btn">
                <button class="btn btn-default btn-flat" type="button" onclick="getImagef();"><i
                        class="fa fa-upload"></i></button>
            </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'email')->textInput(['rows' => 5]) ?>
        </div>
        <div class="col-lg-4">
            <div class="form-group-sm">
                <label for="image">Slogan (*)</label>

                <div class="input-group input-group-sm">
                    <?= $form->field($model, 'slogan')->textInput(['maxlength' => true])->label(false) ?>
                    <span class="input-group-btn">
                <button class="btn btn-default btn-flat" type="button" onclick="getImageS();"><i
                        class="fa fa-upload"></i></button>
            </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group-sm">
                <label for="image">Logo moblie (*)</label>

                <div class="input-group input-group-sm">
                    <?= $form->field($model, 'logo_mobile')->textInput(['maxlength' => true])->label(false) ?>
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-flat" type="button" onclick="getImageM();">
                            <i class="fa fa-upload"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class='col-lg-12' >
        <div class="col-lg-12">
            <?= $form->field($model, 'link_chat')->textInput(['rows' => 5]) ?>
        </div>
    </div>
    <!-- <div class="col-lg-12">
        <div class="form-group-sm">
            <label for="image">Hình ảnh phòng khám (*)</label>
            <div class="input-group input-group-sm">
                <? /*= $form->field($model, 'image')->textInput(['maxlength' => true])->label(false) */ ?>
                <span class="input-group-btn">
                <button class="btn btn-default btn-flat" type="button" onclick="getImageS();"><i
                        class="fa fa-upload"></i></button>
            </span>
            </div>
        </div>
    </div>-->
    <div class="col-lg-12">
        <div class="col-lg-6">
            <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="col-lg-6">
            <?= $form->field($model, 'js')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'procedure_home')->textarea(['rows' => 6]) ?>
        </div>
    </div>




    <?= $form->field($model, 'introduce')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'guide')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'procedure')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'policy')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cập Nhật' : 'Cập Nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<script language="javascript" src="/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">CKEDITOR.replace('config-introduce');</script>

<script type="text/javascript">CKEDITOR.replace('config-video');</script>
<script type="text/javascript">CKEDITOR.replace('config-guide');</script>
<script type="text/javascript">CKEDITOR.replace('config-policy');</script>
<script type="text/javascript">CKEDITOR.replace('config-procedure');</script>
<script language="javascript" src="/ckfinder/ckfinder.js" type="text/javascript"></script>
<script type="text/javascript">
    function getImage() {
        var finder = new CKFinder();
        finder.selectActionFunction = setImageField;
        finder.popup();
    }

    function setImageField(fileUrl) {
        document.getElementById('config-logo').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }
    function getImagef() {
        var finder = new CKFinder();
        finder.selectActionFunction = setImageFieldf;
        finder.popup();
    }

    function setImageFieldf(fileUrl) {
        document.getElementById('config-favicon').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }
    function getImageS() {
        var finder = new CKFinder();
        finder.selectActionFunction = setImageFields;
        finder.popup();
    }

    function setImageFields(fileUrl) {
        document.getElementById('config-slogan').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }

    function getImageM() {
        var finder = new CKFinder();
        finder.selectActionFunction = setImageFieldm;
        finder.popup();
    }

    function setImageFieldm(fileUrl) {
        document.getElementById('config-logo_mobile').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }
</script>
