<?php

namespace app\components\helpers;

use Yii;
use app\models\User;

class LocationHelper {

    public static function getLocationByAddress($address) {

        if (strpos($address, "Vietnam") || strpos($address, "Việt Nam") || strpos($address, "việt nam") || strpos($address, "việt Nam") || strpos($address, "Viet Nam") != false || strpos($address, "viet nam") || strpos($address, "Viet nam") || strpos($address, "viet Nam") || strpos($address, "vietnam") || strpos($address, "VietNam") || strpos($address, "vietNam") || strpos($address, "Việt nam") || strpos($address, "ViệtNam")) {
            $preg = array(
                '/(?<!\\\\)\Viet Nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\viet nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Viet nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\viet Nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\vietnam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\VietNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\vietNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Vietnam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Việt nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\ViệtNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\việt nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\việt Nam(.*?)/si' => "Việt Nam"
            );

            $address = preg_replace(array_keys($preg), array_values($preg), $address);
        } else {

            $address .=", Việt Nam";
        }
        
        $prepAddr = str_replace(' ', '+', $address);
        $ch = curl_init(); // initiate curl
        $url = "http://maps.google.com/maps/api/geocode/json?address=" . $prepAddr;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute  
        $output = json_decode($output);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($output->status == 'OK' && $httpCode == 200) {
           
            return array(
                'lat' => $output->results[0]->geometry->location->lat,
                'long' => $output->results[0]->geometry->location->lng
            );
        } else {
            return false;
        }
    }

    public static function getAddressByGG($address) {

        if (strpos($address, "Vietnam") || strpos($address, "Việt Nam") || strpos($address, "việt nam") || strpos($address, "việt Nam") || strpos($address, "Viet Nam") != false || strpos($address, "viet nam") || strpos($address, "Viet nam") || strpos($address, "viet Nam") || strpos($address, "vietnam") || strpos($address, "VietNam") || strpos($address, "vietNam") || strpos($address, "Việt nam") || strpos($address, "ViệtNam")) {
            $preg = array(
                '/(?<!\\\\)\Viet Nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\viet nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Viet nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\viet Nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\vietnam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\VietNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\vietNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Vietnam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Việt nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\ViệtNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\việt nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\việt Nam(.*?)/si' => "Việt Nam"
            );

            $address = preg_replace(array_keys($preg), array_values($preg), $address);
        } else {

            $address .=", Việt Nam";
        }

        $prepAddr = str_replace(' ', '+', $address);
        $ch = curl_init(); // initiate curl
        $url = "http://maps.google.com/maps/api/geocode/json?address=" . $prepAddr;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute  
        $output = json_decode($output);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($output->status == 'OK' && $httpCode == 200) {
            $district = false;
            $city = false;
            $street_number = false;
            $route = false;
            if (isset($output->results[0])) {
                $response = array();
                foreach ($output->results[0]->address_components as $addressComponet) {
                    //  if (in_array('political', $addressComponet->types)) {
                    if (in_array('administrative_area_level_2', $addressComponet->types)) {
                        $district = true;
                        // return "Thiếu quận huyện";
                    }
                    if (in_array('administrative_area_level_1', $addressComponet->types)) {
                        $city = true;
                        // return "Thiếu thành phố";
                    }
                    if (in_array('street_number', $addressComponet->types)) {
                        $street_number = true;
                        // return "Thiếu quận huyện";
                    }
                    if (in_array('route', $addressComponet->types)) {
                        $route = true;
                        // return "Thiếu thành phố";
                    }

                    //$response[] = $addressComponet->long_name;
                }
                //  }
                return array(
                    'district' => $district,
                    'city' => $city,
                    'street_number' => $street_number,
                    'route' => $route
                );
            }
        } else {
            return false;
        }
    }
    public static function getLocationByIpAdress($ip)
    {
        $ch = curl_init(); // initiate curl
        $url = "http://ipinfo.io/{$ip}";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute  
        $output = json_decode($output);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($output != null){
            return $output;
        }else{
            return null;
        }
        echo'<pre>'; var_dump($output); die;
        if ($output->status == 'OK' && $httpCode == 200) {
            
        }
    }

    public static function getLocationByBrowser() {
        
    }

    public static function getUserNearByLocation($lat, $lng, $distance = 5, $limit = 10, $offset = 0) {
        $sql = 'SELECT user_id,username, 
                ( 6371 * acos( cos( radians(' . $lat . ') ) * cos(radians(latitude) ) * cos(radians(longitude)
                 - radians(' . $lng . ') ) + sin(radians(' . $lat . ')) * sin( radians(latitude) ) ) ) 
                 AS distance FROM user HAVING distance < ' . $distance . ' ORDER BY distance LIMIT ' . $offset . ', ' . $limit . '';
        $listUser = User::findBySql($sql)->asArray()->column();
        return $listUser;
    }

    public static function getThreadNearByLocation($lat_current, $lng_current, $distance = 5, $limit = 10, $offset = 0) {
        $sql = 'SELECT  `pdc_thread`.`created_at` AS `thread_create`, `user`.`created_at` AS `user_create`, `user`.`address`, `pdc_thread`.*,
                ( 6371 * acos( cos( radians(' . $lat_current . ') ) * cos(radians(pdc_thread.latitude) ) * cos(radians(pdc_thread.longitude)
                 - radians(' . $lng_current . ') ) + sin(radians(' . $lat_current . ')) * sin( radians(pdc_thread.latitude) ) ) ) 
                 AS distance 
                 FROM pdc_thread     
                 INNER JOIN `user` ON user.user_id=pdc_thread.user_id
                 WHERE pdc_thread.discussion_state="visible" AND `pdc_thread`.`discussion_open`=1 AND pdc_thread.buy_pass =0 
                 HAVING distance < ' . $distance . ' ORDER BY distance LIMIT ' . $offset . ', ' . $limit . '';
        $listThread = User::findBySql($sql)
                ->asArray()
                ->all();
        return $listThread;
    }

    public static function Getlocation($latitude_curent, $longitude_curent) {
        $geolocation = $latitude_curent . ',' . $longitude_curent;
        $ch = curl_init(); // initiate curl
        $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $geolocation . '&sensor=false';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute  
        $output = json_decode($output);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($output->status == 'OK' && $httpCode == 200) {
            if (isset($output->results[0])) {
                $response = array();
                foreach ($output->results[0]->address_components as $addressComponet) {
                    if (in_array('political', $addressComponet->types)) {
                        $response[] = $addressComponet->long_name;
                    }
                }

                if (isset($response[0])) {
                    $first = $response[0];
                } else {
                    $first = 'null';
                }
                if (isset($response[1])) {
                    $second = $response[1];
                } else {
                    $second = 'null';
                }
                if (isset($response[2])) {
                    $third = $response[2];
                } else {
                    $third = 'null';
                }
                if (isset($response[3])) {
                    $fourth = $response[3];
                } else {
                    $fourth = 'null';
                }
                if (isset($response[4])) {
                    $fifth = $response[4];
                } else {
                    $fifth = 'null';
                }

                if ($first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null') {
                    return array(
                        'error' => false,
                        'Address' => $first,
                        'City' => $second,
                        'State' => $fourth,
                        'Country' => $fifth,
                    );
                } else if ($first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null') {
                    return array(
                        'error' => false,
                        'Address' => $first,
                        'City' => $second,
                        'State' => $third,
                        'Country' => $fourth,
                    );
                } else if ($first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null') {
                    return array(
                        'error' => false,
                        'Address' => '',
                        'City' => $first,
                        'State' => $second,
                        'Country' => $third,
                    );
                } else if ($first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null') {
                    return array(
                        'error' => false,
                        'Address' => '',
                        'City' => '',
                        'State' => $first,
                        'Country' => $second,
                    );
                } else if ($first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null') {
                    return array(
                        'error' => false,
                        'Address' => '',
                        'City' => '',
                        'State' => '',
                        'Country' => $first,
                    );
                }
            }
        } else {
            return false;
        }
    }

    public static function GetlocationByQuang($address) {
        if (strpos($address, "Vietnam") || strpos($address, "Việt Nam") || strpos($address, "việt nam") || strpos($address, "việt Nam") || strpos($address, "Viet Nam") != false || strpos($address, "viet nam") || strpos($address, "Viet nam") || strpos($address, "viet Nam") || strpos($address, "vietnam") || strpos($address, "VietNam") || strpos($address, "vietNam") || strpos($address, "Việt nam") || strpos($address, "ViệtNam")) {
            $preg = array(
                '/(?<!\\\\)\Viet Nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\viet nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Viet nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\viet Nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\vietnam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\VietNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\vietNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Vietnam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\Việt nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\ViệtNam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\việt nam(.*?)/si' => "Việt Nam",
                '/(?<!\\\\)\việt Nam(.*?)/si' => "Việt Nam"
            );

            $address = preg_replace(array_keys($preg), array_values($preg), $address);
        } else {

            $address .=", Việt Nam";
        }

        $prepAddr = str_replace(' ', '+', $address);
        $ch = curl_init(); // initiate curl
        $url = "http://maps.google.com/maps/api/geocode/json?address=" . $prepAddr;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute  
        $output = json_decode($output);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($output->status == 'OK' && $httpCode == 200) {

            $district = false;
            $street_number = false;
            $route = false;

            $city = false;
            $country = false;

            if (isset($output->results[0])) {

                $response = array();
                foreach ($output->results[0]->address_components as $addressComponet) {
                    if (in_array('country', $addressComponet->types)) {
                        $country = true;
                        // return "Thiếu quận huyện";
                    }
                    //  if (in_array('political', $addressComponet->types)) {
                    if (in_array('administrative_area_level_2', $addressComponet->types)) {
                        $district = true;
                        // return "Thiếu quận huyện";
                    }
                    if (in_array('administrative_area_level_1', $addressComponet->types)) {
                        $city = true;
                        // return "Thiếu thành phố";
                    }
                    if (in_array('street_number', $addressComponet->types)) {
                        $street_number = true;
                        // return "Thiếu quận huyện";
                    }
                    if (in_array('route', $addressComponet->types)) {
                        $route = true;
                        // return "Thiếu thành phố";
                    }

                    //$response[] = $addressComponet->long_name;
                }
                //  }

                if ($district == false && $street_number == false && $route == false) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

}
