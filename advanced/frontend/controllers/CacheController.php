<?php
namespace frontend\controllers;
use frontend\modules\models\ProductVariants;


use Yii;

use yii\web\Controller;

class CacheController extends Controller
{
    /**
     * {@inheritdoc}
     */
    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public static function setCache(){
        $m = ProductVariants::find()->all();
        Yii::$app->cache->set('data',$m);
    }

    public function actionCacheData()
    {
        if(Yii::$app->cache->get('data') == ""){
            CacheController::setCache();
        }
  
        return $this->render('cache-data');
    }

    public function actionDeleteCache()
    {
        CacheController::setCache();
        return $this->render('cache-data');
    }

    // public function actionCurlSave(){

        // print_r(file_get_contents("192.168.2.33/yii2/advanced/frontend/web/cache/curl-save"));
    //     echo "Hello";
    // }

    // public function actionCurlRegistration(){

    //     if(Yii::$app->request->post()){
    //         $name = $_POST["uname"];
    //         $password = $_POST["psw"];

    //         $arr = [$name,$password];

    //         echo $name,$password;
    
    //         $data = json_encode($arr);
    
    //         print_r($data);

    //         echo "Hello";

//    $request = curl_init("192.168.2.33/yii2/advanced/frontend/web/cache/curl-save");
//     curl_setopt($request, CURLOPT_POST, true);
//     curl_setopt($request,CURLOPT_POSTFIELDS,$data);


//     curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

//     $output = curl_exec($request);

//     curl_close($request);
//     }else{
//         echo
//          "Hello1";
//     }
// }

//     public function actionCurlForm(){

//         return $this->render('curl-form'); 

//     }

    
}
