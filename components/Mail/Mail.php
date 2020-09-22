<?php

namespace app\components\Mail;
use yii\swiftmailer\Mailer;
use Yii;

class Mail {

    public static function sendMail($email, $subject, $param,$link) {
        $mail = new Mailer();
        $teamplate = $mail->render($link, ['param' => $param]);
        Yii::$app->mailer->compose()
                ->setFrom('from@domain.com')
                ->setTo($email)
                ->setSubject($subject)
                // ->setTextBody('Plain text content')
                ->setHtmlBody($teamplate)
                ->send();
    }

}
