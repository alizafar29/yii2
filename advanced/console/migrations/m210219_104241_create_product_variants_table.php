<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_variants}}`.
 */
class m210219_104241_create_product_variants_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            // $this->createTable('{{%product_variants}}', [
            //     'id' => $this->bigPrimaryKey(),
            //     'product_id' => $this->bigInteger()->notNull(),
            //     'name' => $this->string(16)->notNull(),
            //     'price' => $this->money(),
            //     'inventory' => $this->integer(),
            //     'created_at' => $this->datetime(),
            //     'updated_at' => $this->timeStamp(),
            //     'status' => $this->boolean(),
            // ]);
    
            // // creates index for column `product_id`
            // $this->createIndex(
            //     '{{%idx-product_variants-product_id}}',
            //     '{{%product_variants}}',
            //     'product_id'
            // );
    
            // // add foreign key for table `{{%products}}`
            // $this->addForeignKey(
            //     '{{%fk-product_variants-product_id}}',
            //     '{{%product_variants}}',
            //     'product_id',
            //     '{{%products}}',
            //     'id',
            //     'CASCADE'
            // );
            echo "Hello";
        }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // drops foreign key for table `{{%products}}`
        // $this->dropForeignKey(
        //     '{{%fk-product_variants-product_id}}',
        //     '{{%product_variants}}'
        // );

        // drops index for column `product_id`
        // $this->dropIndex(
        //     '{{%idx-product_variants-product_id}}',
        //     '{{%product_variants}}'
        // );

        // $this->dropTable('{{%product_variants}}');

        // $this->alterColumn('product_variants','inventory',$this->string(16));

        // $this->renameTable('product_variants','product_variant');

            // $this->dropPrimaryKey('id','product_variants');

        // $this->dropColumn('product_variant','test');

        // $this->dropPrimaryKey('id','product_variants');

        // $this->createIndex('ColumnIndex','product_variants','name,price,inventory', $unique=true);

        echo "Bye !";

    }
}
