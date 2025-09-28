<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "contracts".
 *
 * @property int $id
 * @property int $organization_id
 * @property string $date_created
 * @property string|null $date_executed
 *
 * @property Organization $organization
 * @property Sale[] $sales
 */
class Contract extends ActiveRecord
{
    public static function tableName()
    {
        return 'contracts';
    }

    public function rules()
    {
        return [
            [['organization_id', 'date_created'], 'required'],
            [['organization_id'], 'integer'],
            [['date_created', 'date_executed'], 'safe'],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::class, 'targetAttribute' => ['organization_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organization_id' => 'Organization ID',
            'date_created' => 'Date Created',
            'date_executed' => 'Date Executed',
        ];
    }

    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['id' => 'organization_id']);
    }

    public function getSales()
    {
        return $this->hasMany(Sale::class, ['contract_id' => 'id']);
    }
}
