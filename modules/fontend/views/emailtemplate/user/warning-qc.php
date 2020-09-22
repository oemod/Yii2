<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <table cellpadding="0" cellspacing="0" border="0" class="">
        <tbody>
        <tr>
            <td class="" style="width: 100%" >
                <p style="color: red">
                    Cảnh Báo: bạn có thể đang bị đối thủ chơi xấu bằng cách click vào quảng cáo của bạn!
                </p>
                <p style="color: red;  font-weight: bold;">
                    Sử lý:  Bạn hãy nên chặn ip <?=$param['ip']?> này trong quảng cáo của bạn
                </p>
                <div style="width:100%;height:1px;background:#e4e4e4;margin:20px 0"></div>
            </td>
        </tr>
        <tr>
            <td style="width: 100% ;color: red">
                IP: <?=$param['ip']?> đã thực hiện <?=$param['number']?> số lần thực hiện click vào quảng cáo của bạn trong 24h qua
            </td>
        </tr>
        <tr>
            <td style="overflow:hidden;padding:5px 20px 5px 5px">
                [Huyndai Phạm Hùng]
            </td>
        </tr>
        </tbody>
    </table>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
