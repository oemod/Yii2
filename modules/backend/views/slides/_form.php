<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Slides */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-12">
    <div class="box">
        <div id="div-5" class="accordion-body collapse in body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="form-group row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
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
                <div class="col-lg-6">
                    <?= $form->field($model, 'display_image')->dropDownList([
                        \app\models\Slides::STATUS_DISPLAY_M => "Mobile",
                        \app\models\Slides::STATUS_DISPLAY_PC => "PC",
                    ]) ?>
                    
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'display_cat')->dropDownList([
                        \app\models\Slides::DISPLAY_HOME => "HomePage",
                        \app\models\Slides::DISPLAY_CAT_N => "Nam Khoa",
                        \app\models\Slides::DISPLAY_CAT_P => "Phụ Khoa",
                        \app\models\Slides::DISPLAY_CAT_BXH => "Bệnh Xã Hội",
                        \app\models\Slides::DISPLAY_CAT_T => "Kế Hoạch Hóa Gia Đình",
                    ]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'status')->dropDownList(['1' => 'Hoạt động', '0' => 'Khoá']) ?>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="form-group col-lg-4">
    <?= Html::submitButton($model->isNewRecord ? 'Thêm Mới' : 'Câp nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<script language="javascript" src="/ckfinder/ckfinder.js" type="text/javascript"></script>
<script type="text/javascript">
    function getImage() {
        var finder = new CKFinder();
        finder.selectActionFunction = setImageField;
        finder.popup();
    }
    function setImageField(fileUrl) {
        document.getElementById('slides-image').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }


</script>



