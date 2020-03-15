<?php

use app\models\tables\Tasks;
use yii\db\Migration;

/**
 * Handles the creation of table 'users'.
 */
class m190604_060730_create_users_table extends Migration
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
            'email' => $this->string(50)->notNull(),
//            'created' => $this->timestamp(),
            'created' => $this->dateTime(),
//            'updated' => $this->timestamp(),
            'updated' => $this->dateTime(),
        ]);

        $this->createIndex("user_idx", 'users', ['id']);

        $tasksTable = Tasks::tableName();

        $this->batchInsert($this->tableName, ['id', 'username', 'password', 'email', 'created', 'updated'], [
            [1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@task-tracker.site', '2019-06-04 09:50:56',
                '2019-06-04 13:15:31'],
            [2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@task-tracker.site', '2019-06-04 11:03:54',
                '2019-06-04 13:15:34'],
            [3, 'Ivan', 'ee11cbb19052e40b07aac0ca060c23ee', 'ivan@task-tracker.site', '2019-06-04 11:03:54',
                '2019-06-04 13:15:34'],
            [4, 'Vadim', 'ee11cbb19052e40b07aac0ca060c23ee', 'vadim@task-tracker.site', '2019-06-04 11:03:54',
                '2019-06-04 13:15:34'],
            [5, 'Sergey', 'ee11cbb19052e40b07aac0ca060c23ee', 'sergey@task-tracker.site', '2019-06-04 11:03:54',
                '2019-06-04 13:15:34'],
            [6, 'Nikolay', 'ee11cbb19052e40b07aac0ca060c23ee', 'nikolay@task-tracker.site', '2019-06-04 11:03:54',
                '2019-06-04 13:15:34'],
            [7, 'Andrey', 'ee11cbb19052e40b07aac0ca060c23ee', 'andrey@task-tracker.site', '2019-06-04 11:03:54',
                '2019-06-04 13:15:34'],
            [8, 'Alex', 'ee11cbb19052e40b07aac0ca060c23ee', 'alex@task-tracker.site', '2019-06-04 11:03:54',
                '2019-06-04 13:15:34']
        ]);

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
        $tasksTable = Tasks::tableName();

        $this->dropForeignKey('fk_responsible_id', $tasksTable);
        $this->dropForeignKey('fk_creator_id', $tasksTable);
        $this->dropTable('users');
    }
}
