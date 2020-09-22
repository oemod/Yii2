<?php

namespace app\components\helpers;

use yii\web\UploadedFile;
use yii\imagine\Image;
use Yii;

class UploadImage
{

    public static function uploadImage($image, $name, $file, $time)
    {
        $date = Yii::$app->formatter->asDate($time, 'yyyy/MM/dd');
        $file = $file . '/' . $date;
        self::SetFile($file);
        if ($image) {
            $image->saveAs($file . '/' . $name . '-' . $time . $image->baseName .'.' . $image->extension);
            return  $name . '-' . $time . $image->baseName .'.' . $image->extension;
        } else {
            return false;
        }
    }

    public static function uploadMultipleImage($image, $name, $file, $time)
    {
        $date = $date = Yii::$app->formatter->asDate($time, 'yyyy/MM/dd');
        $file = $file . '/' . $date;
        self::SetFile($file);
        if ($image) {
            foreach ($image as $file) {
                $image->saveAs($file . '/' . $name);
            }
            return true;
        } else {
            return false;
        }
    }

    public static function ThubImage($link, $newlink, $width, $height)
    {
        Image::frame($link, 5, '666', 0)
            ->rotate(0)
            ->resize(new \Imagine\Image\Box($width, $height))
            ->save($newlink, ['quality' => 100]);
    }

    public static function SetFile($file)
    {
        if ((is_dir($file) != 1)) {
            if (mkdir('./' . $file, 0777, true)) {
                return true;
            }
        }
        return false;
    }

    public static function GetFile($file)
    {
        if (is_dir($file)) {
            return true;
        }
        return false;
    }

    public static function CreateImage($img, $file,$time)
    {

        self::SetFile($file);

        if (!preg_match('/data:([^;]*);base64,(.*)/', $img, $matches)) {
            die("error");
        }
        if(self::get_extension($matches[1])=='.png'){
            header("Content-type: image/png");
            $name='product_' . $time . '.png';
        }elseif(self::get_extension($matches[1])=='.jpg'){
            header("Content-type: image/jpeg");
            $name='product_' . $time . '.jpg';
        }
        $dirfile = Yii::$app->params['url']['site'] . DIRECTORY_SEPARATOR . 'web/' . $file . '/' . $name;
        $content = base64_decode($matches[2]);
        $im = imagecreatetruecolor(120, 20);
        imagejpeg($im, $dirfile);
        file_put_contents($dirfile, $content);
        return $name;
    }

    public static function Noimage($name, $file)
    {
        $img = 'data:image/png;base64,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';
        self::CreateImage($img, $name, $file);
    }

    public static function GetSizeImage($image)
    {
        return getimagesize(Yii::$app->params['url']['website'] . $image);
    }

    public static function UploadImageLocation($latitude, $longitude, $created_at)
    {
        header("Content-type: image/png");
        $date = Yii::$app->formatter->asDate($created_at, 'yyyy/MM/dd');
        $name = 'location_' . $created_at . '.png';
        $file = 'upload/location/' . $date;
        self::SetFile($file);
        $dirfile = Yii::$app->params['url']['site'] . DIRECTORY_SEPARATOR . 'web/' . $file . '/' . $name;
        $im = imagecreatetruecolor(120, 20);
        imagejpeg($im, $dirfile);
        $url = 'https://maps.googleapis.com/maps/api/staticmap?center=' . $latitude . ',' . $longitude . '&zoom=17&size=295x295&maptype=image/png%20&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318%20&markers=&markers=size:mid%7Ccolor:0xff0000%7C|' . $latitude . ',' . $longitude . '&key=' . Yii::$app->params['google']['apiKey'];
        file_put_contents($dirfile, file_get_contents($url));
        return $name;
    }

    public static function GetAvatar($image, $created_at)
    {
        $date = Yii::$app->formatter->asDate($created_at, 'yyyy/MM/dd');
        $file = 'upload/avatar/' . $date . '/crop/' . $image;
        return Yii::$app->params['url']['website'] . $file;
    }

    public static function GetProductThubm($image, $created_at, $width)
    {
        $date = Yii::$app->formatter->asDate($created_at, 'yyyy/MM/dd');
        $file = 'upload/product/' . $date . '/crop/' . $width . '/' . $image;
        if (!file_exists($file)) {
            if (file_exists('upload/product/' . $date . '/crop/' . $image)) {
                Thumbnail::resizeImage($image, 'upload/product/' . $date . '/crop', $width, $width);
            }
        }
        return Yii::$app->params['url']['website'] . $file;
    }

    public static function GetAvatarThubm($image, $created_at, $width)
    {
        $date = Yii::$app->formatter->asDate($created_at, 'yyyy/MM/dd');
        $file = 'upload/avatar/' . $date . '/crop/' . $width . '/' . $image;
        if (!file_exists($file)) {
            if (file_exists('upload/avatar/' . $date . '/crop/' . $image)) {
                Thumbnail::resizeImage($image, 'upload/avatar/' . $date . '/crop', $width, $width);
            }
        }
        return Yii::$app->params['url']['website'] . $file;
    }

    public static function GetImageLocation($image, $created_at)
    {
        $date = Yii::$app->formatter->asDate($created_at, 'yyyy/MM/dd');
        $file = 'upload/location/' . $date . '/' . $image;
        return Yii::$app->params['url']['website'] . $file;
    }

    public static function CropImage($name, $file, $date)
    {
        $date = Yii::$app->formatter->asDate($date, 'yyyy/MM/dd');
        $file = $file . '/' . $date;

        self::SetFile($file . '/crop');   //print_r($file);die;
        $ini_filename = Yii::$app->params['url']['website'] . $file . '/' . $name;
        $type = self::TypeImage($ini_filename);
        $im = self::ImageCreateFrom($type, $ini_filename);
        $ini_x_size = getimagesize($ini_filename)[0];
        $ini_y_size = getimagesize($ini_filename)[1];
        $crop_measure = min($ini_x_size, $ini_y_size);
        $crop_measure1 = abs(max($ini_x_size, $ini_y_size) - min($ini_x_size, $ini_y_size));
        $height = $crop_measure1 / 2;
        $to_crop_array = array('x' => 0, 'y' => $height, 'width' => $crop_measure, 'height' => $crop_measure);
        $thumb_im = self::mycrop($im, $to_crop_array); //imagecrop($im, $to_crop_array);
        imagejpeg($thumb_im, Yii::$app->params['url']['site'] . DIRECTORY_SEPARATOR . 'web/' . $file . '/crop/' . $name, 100);
    }

    public static function  mycrop($src, array $rect)
    {
        $dest = imagecreatetruecolor($rect['width'], $rect['height']);
        imagecopy(
            $dest,
            $src,
            0,
            0,
            $rect['x'],
            $rect['y'],
            $rect['width'],
            $rect['height']
        );
        return $dest;
    }

    public static function getHeight($width, $height, $width_thumb)
    {
        $height_thubm = ($width_thumb * $height) / $width;
        return $height_thubm;
    }

    public static function Image($fileimage,$image, $width, $create)
    {
        $date = Yii::$app->formatter->asDate($create, 'yyyy/MM/dd');
        $file = 'upload/'.$fileimage.'/' . $date . '/' . $width . '/' . $image;
        if (!file_exists($file)) {
            if (file_exists('upload/'.$fileimage.'/' . $date . '/' . $image)) {
                Thumbnail::resizeImage($image, 'upload/'.$fileimage.'/' . $date, $width, $width);
            }
        }
        return Yii::$app->params['url']['website'] . $file;
    }
    public static function getImage($fileimage,$image, $create)
    {
        $date = Yii::$app->formatter->asDate($create, 'yyyy/MM/dd');
        $file = 'upload/'.$fileimage.'/' . $date . '/' . $image;
        return Yii::$app->params['url']['website'] . $file;
    }
    public static function TypeImage($image)
    {
        $type = exif_imagetype($image);
        switch ($type) {
            case '1' :
                $cover_format = 'gif';
                break;
            case '2' :
                $cover_format = 'jpg';
                break;
            case '3' :
                $cover_format = 'png';
                break;
            case '6' :
                $cover_format = 'bmp';
                break;
            default :
                die('There is an error processing the image -> please try again with a new image');
                break;
        }
        return $cover_format;
    }

    public static function ImageCreateFrom($type, $image)
    {
        switch ($type) {
            case 'gif' :
                $create_img = imagecreatefromgif($image);
                break;
            case 'jpg' :
                $create_img = imagecreatefromjpeg($image);
                break;
            case 'png' :
                $create_img = imagecreatefrompng($image);
                break;
            default :
                die('There is an error processing the image -> please try again with a new image');
                break;
        }
        return $create_img;
    }

    public static function get_extension($imagetype)
    {
        if (empty($imagetype)) return false;
        switch ($imagetype) {
            case 'image/bmp':
                return '.bmp';
            case 'image/cis-cod':
                return '.cod';
            case 'image/gif':
                return '.gif';
            case 'image/ief':
                return '.ief';
            case 'image/jpeg':
                return '.jpg';
            case 'image/pipeg':
                return '.jfif';
            case 'image/tiff':
                return '.tif';
            case 'image/x-cmu-raster':
                return '.ras';
            case 'image/x-cmx':
                return '.cmx';
            case 'image/x-icon':
                return '.ico';
            case 'image/x-portable-anymap':
                return '.pnm';
            case 'image/x-portable-bitmap':
                return '.pbm';
            case 'image/x-portable-graymap':
                return '.pgm';
            case 'image/x-portable-pixmap':
                return '.ppm';
            case 'image/x-rgb':
                return '.rgb';
            case 'image/x-xbitmap':
                return '.xbm';
            case 'image/x-xpixmap':
                return '.xpm';
            case 'image/x-xwindowdump':
                return '.xwd';
            case 'image/png':
                return '.png';
            case 'image/x-jps':
                return '.jps';
            case 'image/x-freehand':
                return '.fh';
            default:
                return false;
        }
    }

}
