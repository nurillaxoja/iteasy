<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departments}}`.
 */
class m200802_052912_create_departments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departments}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'created_at' => $this->dateTime(),
            // 'status' => $this->boolean()->defaultValue(false),
            // 'branch_id' => $this->integer(),
            'company_id' => $this->integer(),
            'status' => "ENUM('active','inactive')",
        ]);
        $this->addForeignKey('fk-department-company-company_id',
        '{{%departments}}',
        'company_id',
        '{{%companies}}',
        'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-department-company-company_id','{{%departments}}');
        // $this->dropForeignKey('fk-department-branch-branch_id','{{%departments}}');
        $this->dropTable('{{%departments}}');
    }
}
