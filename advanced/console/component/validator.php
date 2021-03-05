<?php

namespace console\component;

use yii;

    class Validator{

        public static function checkTable($tableName){
            // $tableSchema = Yii::$app->db->schema->getTableSchema('tableName');
            $tName = Yii::$app->db->schema->getTableSchema($tableName);
            return $tName;
            // echo $tName;
        }

        public function checkColumn($tableName,$columnName){

            $columnData = Yii::$app->db->schema->getTableSchema($tableName)->getColumn($columnName);

            return $columnData;
        }

        public function checkIndex($tableName,$columnName){
            $Index = Yii::$app->db->schema->getTableSchema($tableName);
            $indexKeys = Yii::$app->db->schema->findUniqueIndexes($Index);

            $foreignKey = $Index->foreignKeys;

            $keys = array_merge($indexKeys,$foreignKey);

            foreach($keys as $key => $value){
                if($key == $columnName){
                    return true;
                }
            }
            // return $keys;

        }

    }
   

?>