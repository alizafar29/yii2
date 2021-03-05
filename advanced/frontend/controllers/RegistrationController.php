<?php
namespace frontend\controllers;

    use Yii;
    use yii\web\Controller;
    use frontend\models\Registered;
    use yii\web\UploadedFile;
    use frontend\models\RegisteredSearch;
    use frontend\component\db;
    use frontend\component\events;
    use yii\base\Event;

    class RegistrationController extends Controller{
        public $enableCsrfValidation = false;

        public function actionRegistration(){

            $model = new Registered();
            $url ="localhost/yii2/advanced/frontend/web/registration/curl-save";

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                $model->img = UploadedFile::getInstance($model,'img');
                $fileName = '../../web/image/'.$model->img->baseName.'.'.$model->img->extension;
                $model->img->saveAs('image/'.$fileName);
                $model->img = $fileName;

                // $model->save();

                $data = array(
                    "name"=>$model->name,
                    "Mobile_Number"=>$model->Mobile_Number,
                    "Email"=>$model->Email,
                    "DOB"=>$model->DOB,
                    "img"=>$model->img,
                    "password"=>$model->password,
                );

                $ch=curl_init($url);
                $data_string = json_encode($data);
                // $data_string = http_build_query($data);
                // print_r($data_string);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, array("registration"=>$data_string));
            
            
                $result = curl_exec($ch);
                curl_close($ch);
                // var_dump(json_decode($result,true));
                // echo $result;

                //Inserting data into first database : (db);
                // db::InsertIntoTable($model,'db');

                //Inserting data into Second database : (db2);
                // db::InsertIntoTable($model,'db2');

            //    return $this->render('confirmation', ['id' => $model->id]);  
                // return $this->redirect('../info/show-data');
            } else {
                // either the page is initially displayed or there is some validation error
                return $this->render('registration', ['model' => $model]);
            }

        }


        public function actionCurlSave(){

        //    $var = file_get_contents($url);
    
            $var = $_POST['registration'];
            $var = json_decode($var);

            // print_r($var);
          
            foreach($var as $v){
                echo $v,"<br>";
            }
        }

        public function actionConfirmation()
        {   
            // Yii::$app->on(events::EVENT_SUCCESS,['frontend\component\events','wish']);
            // Yii::$app->trigger(events::EVENT_SUCCESS);
        //    var_dump($e->on(events::EVENT_SUCCESS,[$this, 'wish']));

            $searchModel = new RegisteredSearch();
        
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
            return $this->render('confirmation', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        // const CUSTOM_EVENT = "Event";
        // public function actionConfirmation()
        // {   
        //     $this->on(self::CUSTOM_EVENT, function ($event) {             
        //     // echo "Custom Event Controller";
        //         // event handling logic\

        //         echo "Event function in Same Page !";
        //         // $event->handled = true;
        //         // print_r($event);
        //     },'Events');
        //     $this->trigger(self::CUSTOM_EVENT);
        //     $this->off(self::CUSTOM_EVENT);

          
        // }
    

}

?>