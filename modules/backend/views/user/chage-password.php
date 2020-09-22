<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//$this->registerJsFile(Url::base('') . '/admin/js/user/userSetting.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<?php $form = ActiveForm::begin([
    'id' => 'chage-password-form',
    //'options' => ['class' => 'form-horizontal'],
   /// 'action' => 'javascript:userSetting.chagePassword()',
]); ?>
<div class="alert alert-danger" style="display: none">
    <strong>Lỗi!</strong>
</div>
<p>Bạn muốn đổi mật khẩu? vui lòng nhập mật khẩu cũ và mật khẩu mới ở dưới đây : </p>

<?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true, 'placeholder' => 'Nhập mật khẩu mới'])->label(false) ?>

<?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true, 'placeholder' => 'Nhập lại mật khẩu mới'])->label(false) ?>
<input type="hidden" value='<?php echo $user_id?>' name="user_id">
<div class="bt">
    <?= Html::submitButton('Hoàn tất', ['class' => 'btn create']) ?>
</div>
<?php ActiveForm::end(); ?>
