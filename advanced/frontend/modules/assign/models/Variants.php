<?php
namespace frontend\modules\assign\models;

    use Yii;
    use common\models\User;
    use yii\web\UploadedFile;
    use dosamigos\datepicker\DatePicker;
    use frontend\modules\assign\models\Products;

    class Variants extends \yii\db\ActiveRecord
    {

        public static function getDb()
        {
            return Yii::$app->db3;  
        }

        public static function tableName(){

            return 'variants';
            
        }

        public function rules()
        {
            return [
                [['id','product_id','variant_id','price','inventory'],'required'],
                [['id'], 'integer'],
                [['product_id'], 'integer'],
                [['variant_id'], 'string'],
            //    [['price'], 'integer'],
               [['inventory'], 'integer'],
              
            ];
        }

        public function getProducts() {
            return $this->hasOne(Products::className(), ['product_id' => 'product_id']);
        }
       
    }

?>