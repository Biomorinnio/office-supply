<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "sales".
 *
 * @property int $id
 * @property int $contract_id
 * @property int $product_id
 * @property int $quantity
 *
 * @property Contract $contract
 * @property Product $product
 */
class Sale extends ActiveRecord
{
    public static function tableName()
    {
        return 'sales';
    }

    public function rules()
    {
        return [
            [['contract_id', 'product_id', 'quantity'], 'required'],
            [['contract_id', 'product_id', 'quantity'], 'integer'],
            [['contract_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contract::class, 'targetAttribute' => ['contract_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contract_id' => 'Contract ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
        ];
    }

    public function getContract()
    {
        return $this->hasOne(Contract::class, ['id' => 'contract_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
