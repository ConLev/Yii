<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'auth_item_child'.
 */
class m200315_083418_create_auth_item_child_table extends Migration
{
    protected $tableName = 'auth_item_child';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth_item_child', [
            'parent' => $this->char(64)->notNull(),
            'child' => $this->char(64)->notNull()
        ]);

        $this->batchInsert($this->tableName, ['parent', 'child'], [
            ['admin', 'TaskCreate'],
            ['admin', 'TaskDelete'],
            ['admin', 'TaskUpdate'],
            ['moder', 'TaskCreate'],
            ['moder', 'TaskUpdate']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auth_item_child');
    }
}
