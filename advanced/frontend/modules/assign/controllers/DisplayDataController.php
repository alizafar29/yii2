<?php 

namespace frontend\modules\assign\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\assign\models\CustomSearch;
use frontend\modules\assign\models\Variants;
use frontend\modules\assign\component\Db;

class DisplayDataController extends Controller
{
    public $count = 0;
    public $data = [];
	public function actionData()
	{
            $searchModel = new CustomSearch();        
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
     
            return $this->render('data', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionCustomSearch(){

        $model = new Variants();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

             //Inserting data into first database : (db);
            // Db::InsertIntoProduct($model,$model->product_id,$nodel->title,$model->created_at);

            //Inserting data into Second database : (db2);
            Db::InsertIntoVariants($model,$model->product_id,$model->variant_id,$model->price,$model->inventory);

           return $this->redirect('custom-search');  

        } else {   
            return $this->render('custom-search', [   
                'model' => $model,   
            ]);   
        }   

    }
    
    public function actionDelete($id)   
    {   
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success','You Have Deleted Your Record.');
        // return $this->render('data');  
        $this->redirect('data');  
    }

    protected function findModel($id)   
    {   
        if (($model = Variants::findOne($id)) !== null) {   
            return $model;   
        } else {   
            throw new NotFoundHttpException('The requested page does not exist.');   
        }   
    }


    public function actionUpdate($id)   
        {   

            $model = Variants::findOne($id);

    
            if ($model->load(Yii::$app->request->post()) && $model->validate() ) {

               // $model->save();

                // Db::InsertIntoProduct($model,$model->product_id,$nodel->title,$model->created_at);

                //Inserting data into Second database : (db2);
                Db::UpdateVariant($model,$model->id,$model->product_id,$model->variant_id,$model->price,$model->inventory);
    
               return $this->redirect('data');  
    
            } else {   
                return $this->render('update', [   
                    'model' => $model,   
                ]);   
            }   
        } 


        public function actionExport(){
        
        $file = "file.csv";
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename = $file");
        $selection=(array)Yii::$app->request->post('selection');//typecasting
        if (Yii::$app->request->post('selection_all')) {
                $data = Yii::$app->db3->createCommand("SELECT * FROM `variants`")->queryAll();
                $path = fopen("php://output", 'w');
                $header = array_keys($data[0]);
                fputcsv($path, $header);
                foreach ($data as $val) {
                    fputcsv($path, $val);
                }
    
  
         }else{
            foreach($selection as $id){
                $data = Yii::$app->db3->createCommand("SELECT * FROM `variants` WHERE `id` = $id")->queryAll();
                $path = fopen("php://output", 'w');
                if(!$this->count){
                    $header = array_keys($data[0]);
                    fputcsv($path, $header);
                    $this->count = 1;
                }
                foreach ($data as $val) {
                    fputcsv($path, $val);
                }
    
            }
         }

    }


            public static function setCache(){
                $m = CustomSearch::find()->count();
                Yii::$app->cache->set('data',$m);
            }

            // public function actionCacheData()
            // {
            //     if(Yii::$app->cache->get('data') == ""){
            //         CacheController::setCache();
            //     }
        
            //     return $this->render('cache-data');
            // }

            public function actionRefresh()
            {

                DisplayDataController::setCache();
                $this->redirect('data');  
                // return $this->render('data');
                
            }  
}

?>