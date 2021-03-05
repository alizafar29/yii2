<?php
namespace frontend\controllers;


use Yii;

use yii\web\Controller;
use frontend\models\FakeData;
use yii\web\UploadedFile;
use frontend\component\db;
use yii\helpers\FileHelper;

class CsvController extends Controller
{
    /**
     * {@inheritdoc}
     */



    /**
     * Displays homepage.
     *
     * @return mixed
     */

        public function actionImport()
        {
           $model=new FakeData();
           
           if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->file = UploadedFile::getInstance($model,'file');
            $fileName = time().'.'.$model->file->extension;

            $dir = Yii::getAlias('@adv');
            // $dir = '/opt/lampp/htdocs/yii2/advanced/Csv';

            if( !file_exists($dir) ) {
                $oldmask = umask(0);
                mkdir($dir, 0775, true);
                // FileHelper::createDirectory($dir, $mode = 0777, $recursive = true);
                umask($oldmask);
            }

            $model->file->saveAs($dir."/".$fileName);
            $model->file = $fileName;
            // echo $fileName;
 
              $fileHandler=fopen($dir."/".$fileName,'r');
                if($fileHandler){

                    while(($data = fgetcsv($fileHandler,10000,",")) !== false){
                       
                        $id = $data[0];
                        $first_name = $data[1];
                        $last_name = $data[2];
                        $salary = $data[3];

                        if($id != "id"){
                        db::InsertData($id,$first_name,$last_name,$salary);
                        }
                    }               
                }
                Yii::$app->session->setFlash('success','You Have Inserted/Updated Your Records');
            return $this->render('import');
        
        }else{
            return $this->render('import');
        }
    }

    public function actionExport(){
        
        $file = "file.csv";
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename = $file");
        $data = Yii::$app->db->createCommand("SELECT * FROM fake_data")->queryAll();
        $path = fopen("php://output", 'w');
        //header  
        $header = array_keys($data[0]);
        fputcsv($path, $header);
        foreach ($data as $val) {
            fputcsv($path, $val);
        }
    }
   

}
