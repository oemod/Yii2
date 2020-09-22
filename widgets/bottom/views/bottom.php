<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\helpers\HelperLink;
use app\components\helpers\UploadImage;
use  app\components\helpers\HelperBase;

?>
<div class='fixwidth clearfix'>
    <div class='ft-link-cel'>
        <div class='conner8 ft-link-cel-ct'>
            <h4 class='ft-link-cel-tt'>Bệnh viêm gan</h4>
            <ul class='ft-link-cel-list'>
                <?php if ($menuVG) { ?>
                <?php foreach ($menuVG as $key => $value) { ?>
                    <?php if ($value['lever'] != 2) { ?>
                        <li><a href='<?=$value['route']?>'><?=$value['name']?> </a></li>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class='ft-link-cel'>
        <div class='conner8 ft-link-cel-ct'>
            <h4 class='ft-link-cel-tt'>Điều trị bệnh gan</h4>
            <ul class='ft-link-cel-list'>
                <?php if ($menuDT) { ?>
                    <?php foreach ($menuDT as $key => $value) { ?>
                        <?php if ($value['lever'] != 2) { ?>
                            <li><a href='<?=$value['route']?>'><?=$value['name']?> </a></li>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class='ft-link-cel'>
        <div class='conner8 ft-link-cel-ct'>
            <h4 class='ft-link-cel-tt'>Dịch Vụ phòng khám</h4>
            <ul class='ft-link-cel-list'>
                <?php if ($menuDV) { ?>
                    <?php foreach ($menuDV as $key => $value) { ?>
                        <?php if ($value['lever'] != 2) { ?>
                            <li><a href='<?=$value['route']?>'><?=$value['name']?> </a></li>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class='ft-link-cel'>
        <div class='conner8 ft-link-cel-ct'>
            <h4 class='ft-link-cel-tt'>Tư vấn bác sĩ</h4>
            <ul class='ft-link-cel-list'>
                <?php if ($menuTV) { ?>
                    <?php foreach ($menuTV as $key => $value) { ?>
                        <?php if ($value['lever'] != 2) { ?>
                            <li><a href='<?=$value['route']?>'><?=$value['name']?> </a></li>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>

</div>