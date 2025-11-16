<?php

use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
NavBar::begin([
    'brandLabel' => 'Админ панель',
    'brandUrl' => ['/admin/default/index'],
    'options' => [
        'class' => 'navbar navbar-expand-lg navbar-dark bg-dark',
    ],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav me-auto mb-2 mb-lg-0'],
    'items' => [
        ['label' => 'Организации', 'url' => ['/admin/organization/index']],
        ['label' => 'Продукты', 'url' => ['/admin/product/index']],
        ['label' => 'Договоры', 'url' => ['/admin/contract/index']],
        ['label' => 'Продажи', 'url' => ['/admin/sale/index']],
        ['label' => 'На главную', 'url' => ['/site/index']],
        Yii::$app->user->isGuest
            ? ['label' => 'Вход', 'url' => ['/site/login']]
            : [
                'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
    ],
]);

NavBar::end();
?>

<div class="container mt-4">
    <?= Breadcrumbs::widget([
        'links' => $this->params['breadcrumbs'] ?? [],
    ]) ?>

    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
