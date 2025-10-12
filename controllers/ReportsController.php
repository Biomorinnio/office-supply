<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Product;
use app\models\Sale;
use app\models\Contract;
use app\models\Organization;
use app\models\SearchForm;
use Yii;


class ReportsController extends Controller
{
    public $layout = 'reports';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPricePens()
    {
        $model = new SearchForm();
        $query = Product::find();

        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $query->andFilterWhere(['like', 'description', $model->description]);
        }

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $this->render('price-pens', compact('dataProvider', 'model'));
    }


    public function actionOrdersSeptember()
    {
        $model = new SearchForm();
        $query = Sale::find()->joinWith('contract');

        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $month = $model->month ?: 9; 
            $query->andWhere(['MONTH(contracts.date_created)' => $month]);
        }

        $dataProvider = new ActiveDataProvider(['query' => $query]);
        return $this->render('orders-september', compact('dataProvider', 'model'));
    }


    public function actionOrdersByOrganization()
    {
        $model = new SearchForm();
        $query = Sale::find()->joinWith(['contract.organization', 'product']);

        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $query->andFilterWhere(['like', 'organizations.name', $model->organization_name]);
        }

        $dataProvider = new ActiveDataProvider(['query' => $query]);
        return $this->render('orders-by-organization', compact('dataProvider', 'model'));
    }


 public function actionOrdersCount()
{
    $model = new \app\models\SearchForm();
    $model->load(Yii::$app->request->get());
    $minOrders = $model->min_orders ?: 0;

    $query = \app\models\Organization::find()
        ->alias('o')
        ->select(['o.*', 'COUNT(c.id) AS orders_count'])
        ->joinWith('contracts c', false)
        ->groupBy('o.id')
        ->having(['>=', 'COUNT(c.id)', $minOrders])
        ->asArray();

    $dataProvider = new \yii\data\ActiveDataProvider([
        'query' => $query,
        'pagination' => ['pageSize' => 20],
    ]);

    return $this->render('orders-count', [
        'dataProvider' => $dataProvider,
        'model' => $model,
    ]);
}




  public function actionOrganizationsWithContracts()
    {
        $minContracts = Yii::$app->request->get('SearchForm')['min_contracts'] ?? 2;

        $query = Organization::find()
            ->alias('o')
            ->select(['o.*', 'COUNT(c.id) AS contracts_count'])
            ->joinWith('contracts c', false)
            ->groupBy('o.id')
            ->having(['>=', 'COUNT(c.id)', $minContracts])
            ->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
        ]);

        $model = new \app\models\SearchForm();
        $model->min_contracts = $minContracts;

        return $this->render('organizations-with-contracts', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }



}
