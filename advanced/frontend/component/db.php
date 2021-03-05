<?php

namespace frontend\component;


use yii;

    class db{

        public static function InsertIntoTable($model,$db){

            Yii::$app->$db->createCommand("INSERT INTO `registered` (`id`, `name`,
            `Mobile_Number`, `Email`, `DOB`, `img`, `password`) VALUES (NULL, '$model->name',
             '$model->Mobile_Number', '$model->Email', '$model->DOB', '$model->img', '$model->password')",
           )->execute();

            
        }

        public static function UpdateTable($model,$db){

            Yii::$app->$db->createCommand("UPDATE `registered` SET `name` = '$model->name',
            `Mobile_Number` = '$model->Mobile_Number', `Email` = '$model->Email', `DOB` = 
            '$model->DOB', `img` = '$model->img', `password` = '$model->password' WHERE 
            `registered`.`id` = $model->id;)",
            )->execute();
        }

        public static function InsertData($id,$first_name,$last_name,$salary){

            $status = Yii::$app->db->createCommand("INSERT IGNORE INTO `fake_data` (`id`, `first_name`,
            `last_name`, `salary`) VALUES ('$id', '$first_name', '$last_name', '$salary')",
           )->execute();

            if($status == 0){
                Yii::$app->db->createCommand("UPDATE `fake_data` SET `first_name` = '$first_name',
            `last_name` = '$last_name', `salary` = $salary  WHERE `id` = $id;")->execute();
            }
        }
    }
   

?>