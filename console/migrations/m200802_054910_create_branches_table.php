<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%branches}}`.
 */
class m200802_054910_create_branches_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%branches}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'address' => $this->string(),
            'created_at' => $this->dateTime(),
            // 'status' => $this->boolean()->defaultValue(false),
            'company_id' => $this->integer(),
            'department_id' => $this->integer(),
            'status' => "ENUM('active', 'inactive')"
        ]);

        $this->addForeignKey(
            'fk-branches-companies-company_id',
            '{{%branches}}',
            'company_id',
            '{{%companies}}',
            'id'
        );
        $this->addForeignKey(
            'fk-branches-department-department_id',
            '{{%branches}}',
            'department_id',
            '{{%departments}}',
            'id'


        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-branches-department-department_id','{{%branches}}');
        $this->dropForeignKey('fk-branches-companies-company_id','{{%branches}}');
        $this->dropTable('{{%branches}}');
    }
}
