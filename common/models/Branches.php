<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%branches}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $address
 * @property string|null $created_at
 * @property int|null $company_id
 * @property int|null $department_id
 * @property string|null $status
 *
 * @property Companies $company
 * @property Departments $department
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%branches}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at','status'], 'safe'],
            [['company_id', 'department_id'], 'integer'],
            [['status'], 'string'],
            [['name', 'address'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Branch Name',
            'address' => 'Branch Address',
            'created_at' => 'Created At',
            'company_id' => 'Company ID',
            'department_id' => 'Department ID',
            'status' => 'Status',
        ];
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

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }
}
