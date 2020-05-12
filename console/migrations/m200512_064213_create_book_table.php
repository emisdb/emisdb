<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m200512_064213_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_book}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'category' => $this->integer(11),
            'author' => $this->integer(11),
            'year' => $this->integer(11),
        ]);
		$this->addForeignKey('fk-book[category]', '{{%test_book}}', 'category', '{{%test_category}}', 'id', 'restrict', 'restrict');
		$this->addForeignKey('fk-book[author]', '{{%test_book}}', 'author', '{{%test_author}}', 'id', 'restrict', 'restrict');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_book}}');
    }
}
