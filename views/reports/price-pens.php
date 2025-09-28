<?php
use yii\grid\GridView;

$this->title = 'Цена ручек "черная, гелевая"';
?>
<div class="report-container">
    <h1><?= $this->title ?></h1>
    <p>Отчёт показывает продукцию с описанием "черная" и "гелевая".</p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => '№'], 
            [
                'attribute' => 'id',
                'label' => 'ID',
                'format' => 'text',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'title',
                'label' => 'Название',
                'format' => 'text',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'description',
                'label' => 'Описание',
                'format' => 'text',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'price',
                'label' => 'Цена',
                'enableSorting' => false,
                'format' => ['currency', 'RUB'],
            ],
        ],
    ]) ?>
</div>
