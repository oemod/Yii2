<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\UserWidget;
use app\components\helpers\UploadImage;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('http://maps.googleapis.com/maps/api/js?libraries=places&language=vi&v=3.exp&sensor=false');
$this->registerJsFile('/admins/js/user/userSetting.js');
?>


<div class="col-xs-12">
    <?= UserWidget::widget(['user_id' => Yii::$app->user->id]); ?>
</div>
<?php $form = ActiveForm::begin(['options' =>
    [
        'enctype' => 'multipart/form-data',
        'action' => '/user/view',
    ]
]); ?>
<div class="col-xs-12 content">
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                <div class="col-xs-9 no-padding">
                    <div class="form-group-sm col-md-6 col-sm-12">
                        <div class="form-group-sm col-xs-12">
                            <?= $form->field($model, 'username')->textInput() ?>
                        </div>
                        <div class="form-group-sm col-xs-12">
                            <?= $form->field($model, 'email')->textInput() ?>
                        </div>
                    </div>
                    <div class="form-group-sm col-md-6 col-sm-12 no-padding">
                        <div class="avatar">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                            <span class="btn-file">
                                <span class="fileupload-new"></span>
                                <div class="form-group field-pdcthread-upload has-success">
                                    <span><p>Thay ảnh đại diện</p></span>
                                    <?= $form->field($model, 'avatar')->fileInput()->label(false) ?>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail ">
                                    <div class="fileupload-new ">

                                        <?php if ($model->avatar) {
                                            echo Html::img(Yii::getAlias('@web') . UploadImage::GetAvatar(Yii::$app->user->getIdentity()->avatar, Yii::$app->user->getIdentity()->created_at), ['alt' => 'avatar']);

                                        } else {
                                            echo Html::img(Yii::getAlias('@web') . '/mingo/images/icon/no-avatar.png');
                                        }

                                        ?>
                                    </div>
                                </div>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group-sm col-xs-12">
                        <?= $form->field($model, 'sex')->dropDownList(['1' => 'Nam', '0' => 'Nữ'], ['prompt' => 'Giới tính']) ?>
                    </div>
                    <div class="form-group-sm col-md-12 col-sm-12 ">
                        <?= $form->field($model, 'address')->textInput() ?>
                    </div>
                    <div class="form-group-sm col-md-12 col-sm-12">
                        <?= $form->field($model, 'birthday')->textInput(array('class' => 'form-control datepicker', 'data-date-format' => 'mm/dd/yyyy')) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer text-right">
            <div class="btn-group-xs">
                <button type="submit" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>












