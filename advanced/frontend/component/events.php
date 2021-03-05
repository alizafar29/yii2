<?php

namespace frontend\component;


use yii;
use yii\base\Component;
use yii\base\Event;

    class events extends component{

        const EVENT_SUCCESS = "Success";

        public static function Wish(Event $event){

            // $this->trigger(self::EVENT_SUCCESS);

            // print_r($event);

            echo "<h1>Custom Events</h1><br>";
        }
        
    }

    // $sql = "SELECT * FROM `products` `products` RIGHT JOIN `product_variants` `product_variants` ON `products`.`id` = `product_variants`.`product_id`";
    // $query = Yii::$app->db->createCommand($sql)->execute();
   

?>