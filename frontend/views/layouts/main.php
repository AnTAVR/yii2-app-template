<?php
use common\widgets\Alert;
use common\widgets\TopLink\TopLink;
use frontend\assets\AppAsset;
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
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-static-top', # static|fixed
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>' . Yii::t('app', 'Регистрация'), 'url' => ['/user/default/signup']];
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . Yii::t('app', 'Вход'), 'url' => ['/user/default/login']];
    } else {
        /** @var $identity common\modules\user\models\User */
        $identity = Yii::$app->user->identity;
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . $identity->username,
            'items' => [
                ['label' => '<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>' . Yii::t('app', 'Редактировать профиль'), 'url' => ['/profile/edit']],
                ['label' => '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>' . Yii::t('app', 'Внутренняя почта'), 'url' => ['/messages/inbox']],
                '<li role="presentation" class="divider"></li>',
                ['label' => '<span class="glyphicon glyphicon-off" aria-hidden="true"></span>' . Yii::t('app', 'Выход'),
                    'url' => ['/user/default/logout'],
                    'linkOptions' => ['data-method' => 'post']],
            ],
        ];
    }

    $menuItems[] = [
        'label' => '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>' . Yii::t('app', 'Справка'),
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>' . Yii::t('app', 'О нас'), 'url' => ['/site/about']],
            ['label' => '<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>' . Yii::t('app', 'Правила'), 'url' => ['/site/rules']],
            ['label' => '<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>' . Yii::t('app', 'Новости'), 'url' => ['/site/news']],
            '<li role="presentation" class="divider"></li>',
            ['label' => '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>' . Yii::t('app', 'Обратная связь'), 'url' => ['/site/contact']],
        ],
    ];

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
