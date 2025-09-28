<?php
use yii\grid\GridView;

/** @var $dataProvider yii\data\ArrayDataProvider */

$this->title = 'Продукция по договорам в сентябре';
?>
<h2><?= $this->title ?></h2>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'Название продукта',
            'value' => function ($model) {
                return $model->product->title ?? '';
            }
        ],
        [
            'label' => 'Описание продукта',
            'value' => function ($model) {
                return $model->product->description ?? '';
            }
        ],
        [
            'label' => 'Цена',
            'value' => function ($model) {
                return $model->product->price ?? '';
            },
            'format' => ['currency', 'RUB'],
        ],
        [
            'label' => 'Количество',
            'attribute' => 'quantity',
            'format' => 'text',
        ],
        [
            'label' => 'Дата договора',
            'value' => function ($model) {
                return $model->contract->date_created ?? '';
            }
        ],
    ],
]) ?>
