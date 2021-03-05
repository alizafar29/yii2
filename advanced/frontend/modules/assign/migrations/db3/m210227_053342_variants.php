<?php

use yii\db\Migration;

/**
 * Class m210227_053342_products_variants
 */
class m210227_053342_variants extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('variants', [
                'id' => $this->bigPrimaryKey(),
                'product_id' => $this->bigInteger()->unique()->notNull(),
                'variant_id' => $this->integer(11)->notNull(),
                'price' => $this->money(),
                'inventory' => $this->integer(),
            ]);
    
            // add foreign key for table `{{%products}}`
            $this->addForeignKey(
                'fk_variants_product_id',
                'variants',
                'product_id',
                'products',
                'id',
                'CASCADE'
            );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210227_053342_products_variants cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210227_053342_products_variants cannot be reverted.\n";

        return false;
    }
    */
}
