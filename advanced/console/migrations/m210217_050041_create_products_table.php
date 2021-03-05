<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m210217_050041_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(16)->notNull(),
            'product-handle' => $this->string(30)->unique(),
            'image' => $this->text(),
            'price' => $this->money(),
            'inventory' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp(),
            'status' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // $this->dropTable('{{%products}}');
        // $this->dropColumn('products','status');
        $this->addColumn('products','status',$this->boolean());
    }

}
