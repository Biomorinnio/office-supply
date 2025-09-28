<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $price
 *
 * @property Sale[] $sales
 */
class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['description'], 'default', 'value' => null],
            [['description'], 'string'],
            [['price'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
        ];
    }

    public function getSales()
    {
        return $this->hasMany(Sale::class, ['product_id' => 'id']);
    }
}
