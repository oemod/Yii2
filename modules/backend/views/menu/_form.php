<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Menu;
use yii\helpers\ArrayHelper;
use app\components\helpers\Cache;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="col-lg-12">
    <div class="col-lg-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">
        <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">
        <?= $form->field($model, 'active')->dropDownList([Menu::STATUS_ACTIVE => 'Hoạt động', Menu::STATUS_LOCK => 'Khoá']) ?>
    </div>
</div>
<div class="col-lg-12">
    <div class="col-lg-4">
        <?= $form->field($model, 'position')->dropDownList([Menu::POSITION_TOP => 'Menu trên', Menu::POSITION_BT => 'Menu dưới']) ?>
    </div>

    <div class="col-lg-4">
        <?= $form->field($model, 'order')->textInput() ?>
    </div>
    <div class="col-lg-4">
        <?= $form->field($model, 'metakeywords')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="col-lg-12">
    <div class="col-lg-12">
        <?= $form->field($model, 'metadescription')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="form-group col-lg-12">
    <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
        document.getElementById('menu-image').value = fileUrl;
        // document.getElementById('imagedisplay').src = fileUrl;
    }

</script>