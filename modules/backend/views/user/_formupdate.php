<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\helpers\UploadImage;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
//$this->registerCssFile(Yii::$app->request->baseUrl . '/admin/css/user/setting.css');
//$this->registerJsFile('http://maps.googleapis.com/maps/api/js?libraries=places&language=vi&v=3.exp&sensor=false');
//$this->registerJsFile('/admins/js/user/userSetting.js');
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="col-lg-4">
    <?= $form->field($model, 'username')->textInput() ?>
</div>
<div class="col-lg-4">
    <?= $form->field($model, 'email')->textInput() ?>
</div>
<div class="col-lg-4">
    <?= $form->field($model, 'phone')->textInput() ?>
</div>
<div class="col-lg-4">
    <?= $form->field($model, 'address')->textInput() ?>
</div>
<div class="col-lg-4">
    <?= $form->field($model, 'birthday')->textInput(array('class' => 'form-control datepicker', 'data-date-format' => 'mm/dd/yyyy')) ?>
</div>
<div class="col-lg-4">
    <?= $form->field($model, 'sex')->dropDownList(['1' => 'Nam', '0' => 'Nữ'], ['prompt' => 'Giới tính']) ?>
</div>
<!--<div class="avatar col-lg-12">
    <div class="fileupload fileupload-new" data-provides="fileupload">
        <span class="btn-file">
            <span class="fileupload-new"></span>
            <div class="form-group field-pdcthread-upload has-success">
                <span><p>Thay ảnh đại diện</p></span>
                <?/*= $form->field($model, 'avatar')->fileInput()->label(false) */?>
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail ">
                <div class="fileupload-new ">
                    <?php /*if ($model->avatar) {
                        echo Html::img(Yii::getAlias('@web') . UploadImage::GetAvatar($model->avatar, $model->created_at), ['alt' => 'avatar']);
                    } else {
                        echo Html::img(Yii::getAlias('@web') . '/mingo/images/icon/no-avatar.png');
                    }
                    */?>
                </div>
            </div>
        </span>
    </div>
</div>-->
<div class="col-lg-4">
    <?= $form->field($model, 'group')->dropDownList([User::STATUS_ACTIVE => 'Admin', User::STATUS_LOCK => 'Người dùng'], ['prompt' => 'Nhóm quyền']) ?>
</div>
<div class="col-lg-4">
    <?= $form->field($model, 'status')->dropDownList([User::STATUS_ACTIVE => 'Hoạt động',User::STATUS_LOCK => 'Khoá', User::STATUS_DELETED => 'Xoá'], ['prompt' => 'Trạng thái']) ?>
</div>

<div class="col-lg-4">
    <div class="form-group field-user-status">
        <label class="control-label" for="user-status">Thay đổi mật khẩu</label>
        <a href="javascript:void(0)" class="btn btn-primary btn-quirk btn-stroke" title="ĐỔI MẬT KHẨU" onclick="msn.popupjs(this, '/backend/user/chage-password?id=<?php echo $model->id ?>','ĐỔI MẬT KHẨU', 'chage-password');">Thay đổi mật khẩu</a>
        <div class="help-block"></div>
    </div>

</div>

<div class="form-group col-lg-12">
    <?= Html::submitButton($model->isNewRecord ? 'Thêm Mới' : 'Câp nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
<style>

    .up .fileupload .btn-file {
        width: 100%;
    }
    .thumbnail {
        border-radius: 0;
        border-color: #e9e9e9;
        background-color: #fff;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        min-height: 100%;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .form-group.field-product-upload {
        width: 95%;
        min-height: 110px;
        position: absolute;
    }

    .fileupload-new {
        text-align: center;
    }

    .fileupload-new img {
        max-width: 100%;
        max-height: 100px;
    }

</style>



