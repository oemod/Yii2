<?php

namespace app\components\helpers;

use Yii;

class Facebook {

    public static function getApi($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public static function getAccessToken($redirect_uri) {
        $app_id = Yii::$app->params['facebook']['app_id'];
        $app_secret = Yii::$app->params['facebook']['app_secret'];
        $code = $_GET['code'];
        $facebook_access_token_uri = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";
        $response = Facebook::getApi($facebook_access_token_uri);
        $access_token = str_replace('access_token=', '', explode("&", $response)[0]);
        return $access_token;
    }

    public static function getProfile($access_token) {
        $url = "https://graph.facebook.com/?profile=meaccess_token=$access_token";
        $profile = Facebook::getApi($url);
        return json_decode($profile);
    }

    public static function getPicture($user_id,$time) {
        header("Content-type: image/png");
      //  $dirfile = Yii::$app->params['url']['site'] . DIRECTORY_SEPARATOR . $file;
        $date = Yii::$app->formatter->asDate($time, 'yyyy/MM/dd');
        $file='upload/avatar/'.$date;
        UploadImage::SetFile($file);
        $dirfile=$file.'/avatar' . '-' . $time . '.png';
        $url = "https://graph.facebook.com/".$user_id."/picture?height=180&width=180";
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL, $url);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
        $avatar = curl_exec($ch1);
        curl_close($ch1);
        $im = imagecreatetruecolor(120, 20);
        imagejpeg($im, $dirfile);
        file_put_contents($dirfile, $avatar);


        return true;
    }

    public static function getEmail($user_id) {
        $url = "https://graph.facebook.com/829520073827428/email";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $email = curl_exec($ch);
        curl_close($ch);
        return $email;
    }

}
