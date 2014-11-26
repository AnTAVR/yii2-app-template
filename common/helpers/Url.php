<?php
namespace common\helpers;

use yii\helpers\Url as oldUrl;

class Url extends oldUrl
{
    /**
     * @param $email string
     * @return string
     * yii\validators\EmailValidator->validateValue()
     */
    static function email2ascii($email)
    {
        if (preg_match('/^(.*<?)(.*)@(.*)(>?)$/', $email, $matches)) {
            $email = $matches[1] . idn_to_ascii($matches[2]) . '@' . idn_to_ascii($matches[3]) . $matches[4];
        }
        return $email;
    }

    /**
     * @param $url string
     * @return string
     * yii\validators\UrlValidator->validateValue()
     */
    static function url2ascii($url)
    {
        $url = preg_replace_callback('/:\/\/([^\/]+)/', function ($matches) {
            return '://' . idn_to_ascii($matches[1]);
        }, $url);
        return $url;
    }
}