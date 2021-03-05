<?php
namespace frontend\models;

    use Yii;
    use common\models\User;
    use yii\web\UploadedFile;

    class FakeData extends \yii\db\ActiveRecord
    {
        public $file;
        /**
         * @return array validation rules for model attributes.
         */
        public static function tableName(){

            return 'fake_data';
            
        }

        public function rules()
        {
            return [
                // [['file',],'required'],
                [['file'], 'file', 'extensions' => 'csv'],
            ];
        }
    
        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
            return array(
                'file' => 'Select file',
            );
        }
        
    }
?>