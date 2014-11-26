<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'Регистрация');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('app', 'Пожалуйста заполните следующую форму для регистрации:') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->hint(
                Yii::t('app', 'Длина логина может составлять от {minChars} до {maxChars} символов.', [
                    'minChars' => Yii::$app->params['minUsername'],
                    'maxChars' => Yii::$app->params['maxUsername']])) ?>
            <?= $form->field($model, 'email')->hint(Yii::t('app', 'E-mail должен быть действующий! На него будет выслано письмо с активацией аккаунта.')) ?>
            <?= $form->field($model, 'password')->passwordInput()->hint(
                Yii::t('app', 'Задайте сложный пароль, используя заглавные и строчные буквы, цифры и специальные символы.') .
                '<br/>' . Yii::t('app', 'Минимальная длина пароля {minChars} символов.', [
                    'minChars' => Yii::$app->params['minPassword']])) ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Регистрация'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
