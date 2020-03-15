<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'auth_rule'.
 */
class m200315_055815_create_auth_rule_table extends Migration
{
    protected $tableName = 'auth_rule';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth_rule', [
            'name' => $this->char(64)->notNull(),
            'data' => $this->binary(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auth_rule');
    }
}
