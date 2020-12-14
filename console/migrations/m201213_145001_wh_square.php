<?php

use yii\db\Migration;

/**
 * Class m201213_145001_wh_square
 */
class m201213_145001_wh_square extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->execute("CREATE TABLE `square_webhook` (
		  `id` int(11) NOT NULL auto_increment,
		  `params` varchar(255) default NULL,
		  `ip` varchar(15) NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;");
		return true;

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropTable('square_webhook');
		return true;
	}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201213_145001_wh_square cannot be reverted.\n";

        return false;
    }
    */
}
