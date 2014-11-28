<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\modules\user\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/user/default/reset-password', 'token' => $user->password_reset_token]);
?>

<?= Yii::t('app', 'Здравствуйте') ?> <?= Html::encode($user->username) ?>,

<?= Yii::t('app', 'Пройдите по ссылке ниже для восстановления пароля:') ?>

<?= Html::a(Html::encode($resetLink), $resetLink) ?>
