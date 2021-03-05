<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%registered}}`.
 */
class m210218_042607_create_registered_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registered}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(16),
            'Mobile_Number' => $this->integer(),
            'Email' => $this->string(30),
            'DOB' => $this->datetime(),
            'img' => $this->integer(),
            'password' => $this->string(),
        ]);
        // $this->addPrimaryKey('PK','registered','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%registered}}');
        // $this->addPrimaryKey('PK','registered','Mobile_Number');
    }
}
