<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%departments}}`.
 */
class m200802_093910_add_positon_column_to_departments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%departments}}','branch_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%departments','branch_id');
    }
}
