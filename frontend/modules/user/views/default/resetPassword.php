<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\modules\user\models\ResetPasswordForm */

$this->title = Yii::t('app', 'Восстановление пароля');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('app', 'Пожалуйста выберите Ваш новый пароль:') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
