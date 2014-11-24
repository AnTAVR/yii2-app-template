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
                'pathMap' => [
                    '@app/views' => '@app/themes/christmas/views',
                    '@app/modules' => '@app/themes/christmas/modules',
                    '@app/widgets' => '@app/themes/christmas/widgets',
                ],
            ],
        ],
        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'suffix' => '.html',
        ],
    ],
];
