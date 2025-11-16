<?php

use app\models\Sale;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SaleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sale', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'contract_id',
            'product_id',
            'quantity',

            [
                'attribute' => 'contract_id',
                'label' => 'Договор',
                'value' => fn($model) => $model->contract->id ?? '-',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Contract::find()->all(), 'id', 'id'),
            ],
            [
                'attribute' => 'product_id',
                'label' => 'Продукт',
                'value' => fn($model) => $model->product->title ?? '-',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'title'),
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sale $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
