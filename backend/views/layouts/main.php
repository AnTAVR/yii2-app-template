<?php
use backend\assets\AppAsset;
use common\widgets\Alert;
use common\widgets\TopLink\TopLink;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        /*<![CDATA[*/
        .wrap > .container {
            padding: 0 15px 20px;
        }

        /*]]>*/
    </style>
</head>
<body>
<noscript>
    <p class="noscript">
        <?= Yii::t('app', 'У Вас отключён JavaScript...') ?><br/>
        <?= Yii::t('app', 'Корректная работа сайта не возможна!!!') ?>
    </p>
</noscript>

<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->params['frontendHome'],
        'brandOptions' => ['target' => '_blank'],
        'options' => [
            'class' => 'navbar-inverse navbar-static-top', # static|fixed
        ],
    ]);
    $menuItems = [];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . Yii::t('app', 'Вход'), 'url' => ['/user/default/login']];
    } else {
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>' . Yii::t('app', 'Home'), 'url' => ['/site/index']];
        /** @var $identity common\modules\user\models\User */
        $identity = Yii::$app->user->identity;
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . Yii::t('app', 'Выход ({username})', ['username' => $identity->username]),
            'url' => ['/user/default/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?= TopLink::widget() ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
