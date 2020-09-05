<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%departments}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $created_at
 * @property int|null $company_id
 * @property string|null $status
 *
 * @property Branches[] $branches
 * @property Companies $company
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%departments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['company_id','branch_id'], 'integer'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['company_id',], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['branch_id',], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branch_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Depatment Name',
            'created_at' => 'Created At',
            'company_id' => 'Company ID',
            'status' => 'Status',
            'branch_id' => 'Branch_id',
        ];
    }

    /**
     * Gets query for [[Branches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['id' => 'branch_id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }
}
