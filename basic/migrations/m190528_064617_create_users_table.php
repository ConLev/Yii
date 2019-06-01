<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m190528_064617_create_users_table extends Migration
{
    protected $tableName = 'users';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull(),
            'password' => $this->string(50)->notNull(),
        ]);

        $this->createIndex("user_idx", 'users', ['id']);

        $tasksTable = \app\models\tables\Tasks::tableName();

        $this->addForeignKey('fk_responsible_id', $tasksTable, 'responsible_id', $this->tableName,
            'id', 'cascade', 'no action');
        $this->addForeignKey('fk_creator_id', $tasksTable, 'creator_id', $this->tableName,
            'id', 'cascade', 'no action');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
