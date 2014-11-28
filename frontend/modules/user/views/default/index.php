<?php
/* @var $this yii\web\View */

/** @var yii\web\Controller $context */
$context = $this->context;

$this->title = Yii::t('app', 'Пользователи');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-index">
    <h1><?= $context->action->uniqueId ?></h1>

    <p>
        This is the view content for action "<?= $context->action->id ?>".
        The action belongs to the controller "<?= get_class($context) ?>"
        in the "<?= $context->module->id ?>" module.
    </p>

    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>
