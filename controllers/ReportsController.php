<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Product;
use app\models\Sale;
use app\models\Contract;
use app\models\Organization;

class ReportsController extends Controller
{
    public $layout = 'reports';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPricePens()
    {
        // Отчёт 1
        $query = Product::find()
            ->where(['like', 'description', 'черная'])
            ->andWhere(['like', 'description', 'гелевая']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('price-pens', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOrdersSeptember()
    {
        // Отчёт 2
        $query = Sale::find()
            ->joinWith('contract')
            ->where(['MONTH(contracts.date_created)' => 9]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('orders-september', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOrdersByOrganization()
    {
        // Отчёт 3
        $query = Sale::find()
            ->joinWith(['contract.organization', 'product'])
            ->where(['organizations.name' => 'ИП Малиновский А.С.']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('orders-by-organization', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOrdersCount()
    {
        // Отчёт 4
      $query = Organization::find()
            ->select(['organizations.*', 'COUNT(contracts.id) AS orders_count'])
            ->joinWith('contracts')
            ->groupBy('organizations.id')
            ->asArray(); 

        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $query->all(),
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('orders-count', [
            'dataProvider' => $dataProvider,
        ]);
    }

   public function actionOrganizationsWithContracts()
    {
        // Отчёт 5
        $query = Organization::find()
            ->select(['organizations.*', 'COUNT(contracts.id) AS contracts_count'])
            ->joinWith('contracts')
            ->groupBy('organizations.id')
            ->having('COUNT(contracts.id) > 2')
            ->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('organizations-with-contracts', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
