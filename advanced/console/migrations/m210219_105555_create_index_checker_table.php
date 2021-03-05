<?php

use yii\db\Migration;
use console\component\validator;

/**
 * Handles the creation of table `{{%index_checker}}`.
 */
class m210219_105555_create_index_checker_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->createTable('{{%index_checker}}', [
        //     'id' => $this->primaryKey(),
        // ]);
        $obj = new Validator();
        $data = $obj->checkIndex('product_variants','ColumnIndex');
        if($data){
            echo "Index Already Available !";
        }else{
        $this->createIndex('ColumnIndex','product_variants','name,price,inventory', $unique=true);
        }
               
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $obj = new Validator();
        $data = $obj->checkIndex('product_variants','ColumnIndex');
        if($data){
            $this->dropIndex('ColumnIndex','product_variants');
        
        }else{
            echo "Index Not Available !";

    }
}
}
