<?php

use yii\db\Migration;

/**
 * Class m210223_093658_csv_model
 */
class m210223_093658_csv_model extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%csv_model}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(16),
            'Mobile_Number' => $this->integer(),
            'password' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210223_093658_csv_model cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210223_093658_csv_model cannot be reverted.\n";

        return false;
    }
    */
}
