<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "organizations".
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $phone
 *
 * @property Contract[] $contracts
 */
class Organization extends ActiveRecord
{
    public static function tableName()
    {
        return 'organizations';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 32],
            [['name'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
        ];
    }

    public function getContracts()
    {
        return $this->hasMany(Contract::class, ['organization_id' => 'id']);
    }
}
