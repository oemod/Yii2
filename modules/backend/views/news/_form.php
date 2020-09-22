<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\components\helpers\Cache;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Cache::setCategory(), 'id', 'name'), ['prompt' => 'Danh Mục Cha']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Cache::setAuthor(), 'id', 'name'), ['prompt' => 'Biên tập viên']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'doctor_id')->dropDownList(ArrayHelper::map(Cache::setAuthor(), 'id', 'name'), ['prompt' => 'Bác sĩ']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'post_type')->dropDownList([\app\models\News::STATUS_POST_0 => 'Post', \app\models\News::STATUS_POST_1 => 'Nguyên Nhân', \app\models\News::STATUS_POST_2 => 'Triệu Chứng', \app\models\News::STATUS_POST_3 => 'Điều Trị', \app\models\News::STATUS_POST_4 => 'Tác hại', \app\models\News::STATUS_POST_5 => 'Phòng Bệnh']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'ping_status')->dropDownList([\app\models\News::STATUS_ACTIVE => 'Hoạt động', \app\models\News::STATUS_LOCK => 'Khoá']) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4">
            <div class="form-group">
                <label class="control-label" for="news-sort">Danh mục</label>
                <select required id="select6" class="form-control"
                        name="<?php echo $model->isNewRecord ? 'News[category][]' : 'NewsUpdate[category][]' ?>"
                        style="width: 100%"
                        data-placeholder="Danh mục" multiple>
                    <?php foreach ($category as $value) { ?>
                        <option
                                value="<?= $value['id'] ?>" <?php echo isset($newCategory[$value['id']]) ? 'selected' : '' ?>><?= $value['name'] ?></option>
                    <?php } ?>
                </select>

            </div>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'post_name')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'meta_titile')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>
        </div>
    </div>



    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-lg-4">
            <div class="avatar col-lg-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
        <span class="btn-file">
            <div class="form-group field-pdcthread-upload has-success">
                <?= $form->field($model, 'image')->fileInput()->label(false) ?>
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail ">
                <div class="fileupload-new ">
                    <?php if ($model->image) {
                        echo Html::img(Yii::getAlias('@web') . \app\components\helpers\UploadImage::getImage('news', $model->image, $model->created_at), ['alt' => '']);
                    } else {
                        echo Html::img(Yii::getAlias('@web') . '/upload/noimage.jpg');
                    }
                    ?>
                </div>
            </div>
        </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-12">
            <?= $form->field($model, 'post_content')->textarea(['rows' => 5]) ?>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="col-lg-4">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm Mới' : 'Cập Nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script language="javascript" src="/ckeditor/ckeditor.js" type="text/javascript"></script>


<?php if (!$model->isNewRecord) { ?>
    <script type="text/javascript">CKEDITOR.replace('newsupdate-post_content'); </script>
<?php } else { ?>
    <script type="text/javascript">CKEDITOR.replace('news-post_content'); </script>
<?php } ?>


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

    .thumbnail > img {
        max-height: 100px;
    }

</style>