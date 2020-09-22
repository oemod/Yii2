<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>
<div class="row">
    <?php foreach($teamplate as $key=>$value){?>
    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-success panel-colorful text-center">
            <div class="panel-body">
                <div id="demo-sparkline-area">
                    <canvas width="130" height="75"
                            style="display: inline-block; width: 130px; height: 75px; vertical-align: top;"></canvas>
                </div>
            </div>
            <div class="bg-light pad-ver">
                <h4 class="text-thin"><?php echo $value->title?></h4>
                <a href="/backend/email/send-email?id=<?php echo $value->id?>">Gửi mail</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>