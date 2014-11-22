<?php
namespace common\widgets\TopLink;

use yii\web\AssetBundle;

class TopLinkAsset extends AssetBundle
{
    public $sourcePath = '@common/widgets/TopLink/assets';

    public $css = [
        'toplink.css',
    ];

    public $js = [
        'toplink.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}