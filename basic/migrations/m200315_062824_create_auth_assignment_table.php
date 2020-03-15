<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'auth_assignment'.
 */
class m200315_062824_create_auth_assignment_table extends Migration
{
    protected $tableName = 'auth_assignment';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth_assignment', [
            'item_name' => $this->char(64)->notNull(),
            'user_id' => $this->char(64)->notNull(),
            'created_at' => $this->integer(11)
        ]);

        $this->batchInsert($this->tableName, ['item_name', 'user_id', 'created_at'], [
            ['admin', '1', 1560824828],
            ['moder', '8', 1560824828]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auth_assignment');
    }
}
