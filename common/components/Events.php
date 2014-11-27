<?php
namespace common\components;

use Yii;

//use yii\base\Event;

class Events //extends Event
{
    public static function beforeRequest($event)
    {
        $session = Yii::$app->session;
        if (!$session->has('referrerUrl')) {
            $temp = Yii::$app->request->referrer;
            $session->set('referrerUrl', $temp ?: '');
        };
        if (!$session->has('referrerUserIP')) {
            $temp = Yii::$app->request->userIP;
            $session->set('referrerUserIP', $temp ?: '');
        };
        if (!$session->has('referrerUserAgent')) {
            $temp = Yii::$app->request->userAgent;
            $session->set('referrerUserAgent', $temp ?: '');
        };
    }
} 