<?php
namespace frontend\models;

    use Yii;
    use common\models\User;
    use yii\web\UploadedFile;
    use dosamigos\datepicker\DatePicker;

    class Registered extends \yii\db\ActiveRecord
    {
        // public $img;

        public static function tableName(){
            // $m = registered::find()->all();
        // Yii::$app->cache->set('data',$m);
        // $n = Yii::$app->cache->get('data'),
            return 'registered';
            
        }

        public function rules()
        {
            return [
                [['name','Mobile_Number','Email','DOB','password'],'required'],
                [['name'], 'string'],
                [['Mobile_Number'], 'integer'],
               [['Email'], 'email'],
            //    [['DOB'], 'date'],
               [['img'], 'file','skipOnEmpty'=>true],
            //    [['password'], 'password'],
            ];
        }
       
    }

?>