<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

/** @noinspection PhpIncludeInspection */
require(__DIR__ . '/../../vendor/autoload.php');
/** @noinspection PhpIncludeInspection */
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
/** @noinspection PhpIncludeInspection */
require(__DIR__ . '/../../common/config/bootstrap.php');
/** @noinspection PhpIncludeInspection */
require(__DIR__ . '/../config/bootstrap.php');

/** @noinspection PhpIncludeInspection */
$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

$application = new yii\web\Application($config);
$application->run();
