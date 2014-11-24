<?php
return [
    'name' => 'Название компании',
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/christmas',
                'baseUrl' => '@web/themes/christmas',
            ],
        ],
        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'suffix' => '.html',
        ],
    ],
];
