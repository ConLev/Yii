<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'test'.
 */
class m190604_050123_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'title' => $this->char(50),
            'content' => $this->char(255)
        ]);

        $this->batchInsert('test', ['id', 'title', 'content'], [
            [1, 'title1', 'update'],
            [2, 'title2', '1111111'],
            [3, 'title3', '2222222'],
            [4, 'title4', '3333333']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test');
    }
}
