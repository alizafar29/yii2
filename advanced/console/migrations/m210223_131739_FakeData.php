<?php

use yii\db\Migration;

/**
 * Class m210223_131739_FakeData
 */
class m210223_131739_FakeData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fake_data}}', [
            'id' => $this->primaryKey(),
            'permalink' => $this->string(255),
            'company' => $this->string(255),
            'numEmps' => $this->string(255),
            'category' => $this->string(255),
            'city' => $this->string(255),
            'state' => $this->string(255),
            'fundedDate' => $this->date(),
            'raisedAmt' => $this->integer(11),
            'raisedCurrency' => $this->string(11),
            'round' => $this->string(11),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210223_131739_FakeData cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210223_131739_FakeData cannot be reverted.\n";

        return false;
    }
    */
}
