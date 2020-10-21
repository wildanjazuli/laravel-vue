<?php
namespace App\Helpers;

class APIHelper {
    public static function create($is_error, $code, $message, $content)
    {
        $result = [];
        $response = '';
        if($is_error){
            $response = 'error';
        } else {
            $response = 'success';
        }

        $result['status']['code'] = $code;
        $result['status']['response'] = $response;
        $result['status']['message'] = $message;
        $result['result'] = $content;

        return $result;
    }
}