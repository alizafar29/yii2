<?php

use yii\db\Migration;

/**
 * Class m210227_053051_products
 */
class m210227_053051_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->bigPrimaryKey(),
            'product_id' => $this->integer(16)->unique()->notNull(),
            'title' => $this->text(),
            'created_at' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210227_053051_products cannot be reverted.\n";

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210227_053051_products cannot be reverted.\n";

        return false;
    }
    */
}
