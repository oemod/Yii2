<?php

namespace app\components\helpers;

use Yii;

class ImageHelper
{

   public static function resizeImage($sourceFile, $destFile, $width, $height)//thuc muc/thu muc lưu/ do rong
    {
        $proportional = true;
        $output = 'file';
        copy($sourceFile, $destFile);
        $file = $destFile;
        if ($height <= 0 && $width <= 0)
            return false;
        # get image size
        $info = getimagesize($file);
        $image = '';
        list($width_old, $height_old) = $info;
        $final_width = 0;
        $final_height = 0;
        $dims = self::resizeBoundary($width_old, $height_old, $width, $height);
        $final_height = $dims['height'];
        $final_width = $dims['width'];
        switch ($info[2])
        {
            case IMAGETYPE_GIF: $image = imagecreatefromgif($file);
                break;
            case IMAGETYPE_JPEG: $image = imagecreatefromjpeg($file);
                break;
            case IMAGETYPE_PNG: $image = imagecreatefrompng($file);
                break;
            default: return false;
        }
# This is the resizing/resampling/transparency-preserving magic
        $image_resized = imagecreatetruecolor($final_width, $final_height);
        if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG))
        {
            $transparency = imagecolortransparent($image);
            if ($transparency >= 0)
            {
                $transparent_color = imagecolorsforindex($image, $trnprt_indx);
                $transparency = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                imagefill($image_resized, 0, 0, $transparency);
                imagecolortransparent($image_resized, $transparency);
            } elseif ($info[2] == IMAGETYPE_PNG)
            {
                imagealphablending($image_resized, false);
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
                imagefill($image_resized, 0, 0, $color);
                imagesavealpha($image_resized, true);
            }
        }
        imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
        $output = $file;
# Writing image according to type to the output destination
        switch ($info[2])
        {
            case IMAGETYPE_GIF: imagegif($image_resized, $output);
                break;
            case IMAGETYPE_JPEG: imagejpeg($image_resized, $output);
                break;
            case IMAGETYPE_PNG: imagepng($image_resized, $output);
                break;
            default: return false;
        }
        return true;
    }

   public static function resizeBoundary($oldW, $oldH, $newW = '', $newH = '')
    {
        if (!($oldW > 0 && $oldH > 0))
            return;
        $tempW = ( $oldW * $newH ) / ( $oldH );
        $tempH = ( $oldH * $newW ) / ( $oldW );
        if ($newW == "" && $newH != "")
        {
            if ($newH > $oldH)
            {
                $dims = self::resizeBoundary($oldW, $oldH, '', $oldH);
                $finalH = $dims['height'];
                $finalW = $dims['width'];
            } else
            {
                $finalH = $newH;
                $finalW = $tempW;
            }
        } else if ($newW != "" && $newH == "")
        {
            if ($newW > $oldW)
            {
                $dims = self::resizeBoundary($oldW, $oldH, $oldW, '');
                $finalH = $dims['height'];
                $finalW = $dims['width'];
            } else
            {
                $finalH = $tempH;
                $finalW = $newW;
            }
        } else if ($newW != "" && $newH != "")
        {
            if ($tempW > $newW)
            {
                if ($newW > $oldW)
                {
                    $dims = self::resizeBoundary($oldW, $oldH, $oldW, '');
                    $finalH = $dims['height'];
                    $finalW = $dims['width'];
                } else
                {
                    $finalH = $tempH;
                    $finalW = $newW;
                }
            } else
            {
                if ($newH > $oldH)
                {
                    $dims = self::resizeBoundary($oldW, $oldH, '', $oldH);
                    $finalH = $dims['height'];
                    $finalW = $dims['width'];
                } else
                {
                    $finalH = $newH;
                    $finalW = $tempW;
                }
            }
        }
        $dims['height'] = $finalH;
        $dims['width'] = $finalW;
        return $dims;
    }

}
