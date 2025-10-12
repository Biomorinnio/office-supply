<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\SearchForm $model */

$this->title = 'Поиск товаров по описанию';
?>
<div class="report-container container mt-4">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Введите часть описания, чтобы найти товары (например, «гелевая», «черная»).</p>

    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <?= $form->field($model, 'description')->textInput(['placeholder' => 'Введите описание...'])->label(false) ?>
            </div>
            <div class="col-md-2">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary w-100']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-bordered table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'title', 'label' => 'Название'],
            ['attribute' => 'description', 'label' => 'Описание'],
            ['attribute' => 'price', 'label' => 'Цена'],
        ],
    ]) ?>
</div>
