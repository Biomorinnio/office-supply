<?php

namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    public $description;      
    public $month;             
    public $organization_name; 
    public $min_contracts;     
    public $min_orders;

    public function rules()
    {
        return [
            [['description', 'organization_name'], 'trim'],
            [['description', 'organization_name'], 'string', 'max' => 100],
            [['month', 'min_contracts'], 'integer', 'min' => 1],
            ['month', 'integer', 'max' => 12],
            [['month', 'min_contracts'], 'default', 'value' => null],
            [['min_orders', 'min_contracts'], 'integer', 'min' => 0],
        ];
    }

    public function attributeLabels()
    {
        return [
            'description' => 'Описание товара',
            'month' => 'Месяц (1–12)',
            'organization_name' => 'Название организации',
            'min_contracts' => 'Минимальное количество договоров',
        ];
    }
}
