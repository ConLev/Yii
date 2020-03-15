<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'auth_item'.
 */
class m200315_062501_create_auth_item_table extends Migration
{
    protected $tableName = 'auth_item';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth_item', [
            'name' => $this->char(64)->notNull(),
            'type' => $this->integer(6)->notNull(),
            'description' => $this->text(),
            'rule_name' => $this->char(64),
            'data' => $this->binary(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
        ]);

        $this->batchInsert($this->tableName, ['name', 'type', 'description', 'rule_name', 'data', 'created_at',
            'updated_at'], [
            ['admin', 1, NULL, NULL, NULL, 1560824828, 1560824828],
            ['moder', 1, NULL, NULL, NULL, 1560824828, 1560824828],
            ['TaskCreate', 2, NULL, NULL, NULL, 1560824828, 1560824828],
            ['TaskDelete', 2, NULL, NULL, NULL, 1560824828, 1560824828],
            ['TaskUpdate', 2, NULL, NULL, NULL, 1560824828, 1560824828]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auth_item');
    }
}
