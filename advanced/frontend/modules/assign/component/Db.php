<?php

namespace frontend\modules\assign\component;


use yii;

    class Db{

        public static function InsertIntoProduct($model,$product_id,$title,$created_at){

           $status = Yii::$app->db3->createCommand("INSERT INTO `products` (`id`, `product_id`,
            `title`, `created_at`) VALUES (NULL, '$model->product_id',
             '$model->title', '$model->created_at')",
           )->execute();          
        }

        public static function InsertIntoVariant($model,$product_id,$variant_id,$price,$inventory){

            $status1 = Yii::$app->db3->createCommand("INSERT INTO `variants` (`id`, `product_id`, `variant_id`,
            `price`, `inventory`) VALUES (NULL, '$model->product_id', '$model->variant_id',
             '$model->price', '$model->inventory')",
           )->execute();
        }

        public static function UpdateProduct($model,$product_id,$title,$created_at){

            $status = Yii::$app->db3->createCommand("INSERT INTO `products` (`id`, `product_id`,
             `title`, `created_at`) VALUES (NULL, '$model->product_id',
              '$model->title', '$model->created_at')",
            )->execute();          
         }
 
         public static function UpdateVariant($model,$id,$product_id,$variant_id,$price,$inventory){
 
             $status1 = Yii::$app->db3->createCommand("UPDATE `variants` SET `product_id` = '$product_id',
             `variant_id` = '$variant_id', `price` = $price, `inventory` = '$inventory' WHERE `id` = $id;")->execute();
         }
    }
   

?>