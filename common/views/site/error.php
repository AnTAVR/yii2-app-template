<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p><?= Yii::t('app', 'Произошла ошибка при запросе страницы.') ?></p>

    <p><?= Yii::t('app', 'Пожалуйста свяжитесь с нами если вы считаете что это ошибка сервера.') ?> <?= Yii::t('app', 'Спасибо.') ?></p>

</div>
