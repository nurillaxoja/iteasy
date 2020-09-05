<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 */
class m200802_052122_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companies}}', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(),
            'email' => $this->string(),
            'address' => $this->string(),
            'company_start_date' => $this->date(),
            'created_at' => $this->dateTime(),
            // 'status' => $this->boolean()->defaultValue(false)
            'status' => "ENUM('active','inactive')",

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%companies}}');
    }
}
