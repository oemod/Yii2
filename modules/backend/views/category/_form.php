<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\components\helpers\Cache;
/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12">
        <div class="col-lg-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(app\components\helpers\Menu::Menucategory(), 'id', 'name'), ['prompt' => 'Danh Mục cha']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'active')->dropDownList([\app\models\Category::STATUS_ACTIVE => 'Hoạt động', \app\models\Category::STATUS_LOCK => 'Khoá', \app\models\Category::STATUS_DELETED => 'Xoá']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true,'readonly'=> true]) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'meta_seo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-6">
            <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-3">
            <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Cache::setAuthor(), 'id', 'name'), ['prompt' => 'Biên tập viên']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'doctor_id')->dropDownList(ArrayHelper::map(Cache::setAuthor(), 'id', 'name'), ['prompt' => 'Bác sĩ']) ?>
        </div>
        <div class="form-group-sm col-xs-6">
            <label for="image">Hình Ảnh(*)</label>
            <div class="input-group input-group-sm">
                <?= $form->field($model, 'image_ad')->textInput(['maxlength' => true])->label(FALSE) ?>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-flat" type="button" onclick="getImage();"><i
                                class="fa fa-upload"></i></button>
                </span>
            </div>
        </div>
    </div>
    <br>
    <div class="col-lg-12">
        <div class="col-lg-12">
            <?= $form->field($model, 'content')->textarea([]) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm Mới' : 'Cập Nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::resetButton($model->isNewRecord ? 'Nhập lại' : 'nhập lại', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-danger']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<script language="javascript" src="/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">CKEDITOR.replace('category-content');</script>

<script language="javascript" src="/ckfinder/ckfinder.js" type="text/javascript"></script>
<script type="text/javascript">
                        function getImage() {
                            var finder = new CKFinder();
                            finder.selectActionFunction = setImageField;
                            finder.popup();
                        }
                        function setImageField(fileUrl) {
                            document.getElementById('category-image_ad').value = fileUrl;
                            // document.getElementById('imagedisplay').src = fileUrl;
                        }


</script>