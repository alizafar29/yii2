<?php
namespace frontend\controllers;

    use Yii;
    use yii\web\Controller;
    use frontend\models\Registered;
    use yii\web\UploadedFile;
    use frontend\models\RegisteredSearch;
    use frontend\component\db;

    class InfoController extends Controller{


        public function actionShowData(){
            return $this->render('show-data');
        }

        public function actionDelete($id)   
        {   
            $model = new Registered();
            $this->findModel($id)->delete();   
            return $this->render('show-data');  
        }

        public function actionUpdate($id)   
        {   
            $model = $this->findModel($id);
    
            if ($model->load(Yii::$app->request->post()) && $model->validate() ) {

                $model->img = UploadedFile::getInstance($model,'img');
                $fileName = '../../web/image/'.$model->img->baseName.'.'.$model->img->extension;
                $model->img->saveAs('image/'.$fileName);
                $model->img = $fileName;

                // $model->save();

                //Updating data into first database : (db);
                db::UpdateTable($model,'db');

                //Updating data into second database : (db2);
                db::UpdateTable($model,'db2');

                return $this->render('show-data', ['id' => $model->id]);   
            } else {   
                return $this->render('update', [   
                    'model' => $model,   
                ]);   
            }   
        } 

        protected function findModel($id)   
        {   
            if (($model = Registered::findOne($id)) !== null) {   
                return $model;   
            } else {   
                throw new NotFoundHttpException('The requested page does not exist.');   
            }   
        }
    }

?>