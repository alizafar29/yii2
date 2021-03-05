<?php
namespace frontend\modules\assign\models;

    use Yii;
    use common\models\User;
    use yii\web\UploadedFile;
    use dosamigos\datepicker\DatePicker;

    class Products extends \yii\db\ActiveRecord
    {


        public static function getDb()
        {
            return Yii::$app->db3;  
        }

        public static function tableName(){

            return 'products';
            
        }

        public function rules()
        {
            return [
                // [['id','product_id','title','created_at'],'required'],
                [['id'], 'integer'],
                [['product_id'], 'integer'],
               [['title'], 'integer'],
               [['created_at'], 'date'],
            ];
        }
       
    }

?>