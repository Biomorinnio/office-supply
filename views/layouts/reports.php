<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var \yii\web\View $this */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="container mt-4">
    <header class="mb-4">
        <h1 class="text-primary text-center text-black font-weight-bold">Отчёты</h1>
    </header>

   <nav class="mb-4">
    <div class="container">
        <ul class="nav nav-pills d-flex flex-wrap justify-content-center gap-3 bg-light p-3 rounded shadow-sm">
            <li class="nav-item">
                <a class="nav-link px-3" href="<?= Url::to(['reports/price-pens']) ?>">Цена ручек "черная, гелевая"</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="<?= Url::to(['reports/orders-september']) ?>">Продукция по договорам в сентябре</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="<?= Url::to(['reports/orders-by-organization']) ?>">Заказы ИП Малиновский А.С.</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="<?= Url::to(['reports/orders-count']) ?>">Количество заказов организаций</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="<?= Url::to(['reports/organizations-with-contracts']) ?>">Организации с более чем 2 договорами</a>
            </li>
        </ul>
    </div>
  </nav>



    <main>
        <?= $content ?>
    </main>

    <footer class="mt-5 text-center text-muted">
        &copy; <?= date('Y') ?> — Отчётная система
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
