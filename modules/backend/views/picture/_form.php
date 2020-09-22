<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Picture;
/* @var $this yii\web\View */
/* @var $model app\models\Picture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picture-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12">
        <div class="form-group-sm">
            <label for="image">Image (*)</label>
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
        <?= $form->field($model, 'postion')->dropDownList([
            Picture::POSTION_PK => "Hình ảnh phòng khám",
            Picture::POSTION_TB => "Hình ảnh Thiết bị",
            Picture::POSTION_CC => "Hình ảnh Chứng chỉ",
        ],['prompt' => 'Vị trí bài viết']) ?>
    </div>
</br>
    <div class="form-group col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
        document.getElementById('picture-image').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }

</script>