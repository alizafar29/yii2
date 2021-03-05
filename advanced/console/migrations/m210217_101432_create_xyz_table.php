<?php

use yii\db\Migration;
use console\component\validator;

/**
 * Handles the creation of table `{{%xyz}}`.
 */
class m210217_101432_create_xyz_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%xyz}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $obj = new Validator();
        $columnName = $obj->checkColumn('xyz','name');
        if($columnName){
        $this->dropTable('{{%xyz}}');
        echo "Drop Table Successfully !";
    }else{
        die("Column Not Existed !");
    }
}
}
